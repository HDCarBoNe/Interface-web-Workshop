<?php
  $SERVERNAME = 'localhost';
  $DBNAME = 'workshop';
  $USER = 'work';
  $PASS = 'Epsi2020!';
  //$db = new mysqli($SERVERNAME,$USER,$PASS,$DBNAME);
  //include 'config_mail.php';
  //mail_send_ip('dylan.priou.android@gmail.com','86.217.56.90','12345');
  try {
      $db = new PDO("mysql:host=".$servername.";dbname=".$DBNAME, $USER, $PASS);
      // set the PDO error mode to exception
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
      }
  catch(PDOException $e)
      {
      //echo "Connection failed: " . $e->getMessage();
      echo '<div class="alert alert-danger alert-dismissible fade show">
              <strong>Erreur!</strong> Connection failed: '. $e->getMessage().'
              <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>';
      }

  //Vérifie l'adresse IP utilisé avec la précédente
  //Est-ce que l'IP est la même ?
  function pdo_compare_ip($user,$ip){
    $SERVERNAME = 'localhost';
    $DBNAME = 'workshop';
    $USER = 'work';
    $PASS = 'Epsi2020!';
    $db = new PDO("mysql:host=localhost;dbname=".$DBNAME, $USER, $PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request=$db->prepare("SELECT last_ip FROM users WHERE username=:user");
    $request->bindParam(':user',$user);
    $request->execute();
    $result=$request->fetchColumn();
    //Si ip vide on la set
    if(empty($result)){
      echo "ip:".$ip."<br> user:".$user;
      $request1=$db->prepare("UPDATE users set last_ip=:ip WHERE username=:user");
      $request1->bindParam(':ip',$ip);
      $request1->bindParam(':user',$user);
      $request1->execute();
      //$request1->close();
      //echo "vrai";
      $request1 = null;
      $db = null;
      return true;
    }
    elseif($result != $ip){
      //Envoyer un mail + attendre la validation ce celui-ci
      $token = md5(uniqid(rand(), true));
      try {
        $request1=$db->prepare("UPDATE users SET token_delock=:token, compte_lock=1  WHERE username=:user");
        $request1->bindParam(':token',$token);
        $request1->bindParam(':user',$user);
        //var_dump($request1);
        $request1->execute();
      } catch (PDOException $e) {
        echo "sql Failed: ". $e->getMessage();
      }

      //$request1->close();
      //echo "faux";
      //mail_send_ip($_SESSION['mail'],$ip,$token);
      return false;
    }
    else{
      //echo "else vrai";
      return true;
    }
  }
  //Est-ce que l'utilisateur est bloqué ?
  //retourne true ou false
  function pdo_user_lock($user){
    $SERVERNAME = 'localhost';
    $DBNAME = 'workshop';
    $USER = 'work';
    $PASS = 'Epsi2020!';
    $db = new PDO("mysql:host=".$servername.";dbname=".$DBNAME, $USER, $PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request=$db->prepare("SELECT compte_lock FROM users WHERE username=:user");
    $request->bindParam(':user',$user);
    $request->execute();
    $result=$request->fetchColumn();
    if($result == 0){
      return false;
    }
    else{
      return true;
    }
  }

  //Est-ce que l'utilisateur existe ?
  //Si oui return true
  //Si non création de l'utilisateur
  function pdo_user_create($user){
    $SERVERNAME = 'localhost';
    $DBNAME = 'workshop';
    $USER = 'work';
    $PASS = 'Epsi2020!';
    $db = new PDO("mysql:host=localhost;dbname=".$DBNAME, $USER, $PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request=$db->prepare("SELECT * FROM users WHERE username=:user");
    $request->bindParam(':user',$user);
    $request->execute();
    $result = $request->fetchAll();
    //$request->close();
    if(!isset($result[0])){
      $request1=$db->prepare("INSERT INTO users(username) VALUES (:user)");
      $request1->bindParam(":user",$user);
      $request1->execute();
      //echo "faux";
      return false;
    }
    else{
      //echo "vrai";
      return true;
    }
  }

  //Vérifie le navigateur actuelle avec le précédent
  //Est-ce que le nav est le même ?
  function pdo_compare_nav($user, $browser){
    $SERVERNAME = 'localhost';
    $DBNAME = 'workshop';
    $USER = 'work';
    $PASS = 'Epsi2020!';
    $db = new PDO("mysql:host=localhost;dbname=".$DBNAME, $USER, $PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request=$db->prepare("SELECT last_nav FROM users WHERE username=:user");
    $request->bindParam(':user',$user);
    $request->execute();
    $result=$request->fetchColumn();
    //Si resultat vide on le set
    if(empty($result)){
      $request1=$db->prepare("UPDATE users SET last_nav=:browser WHERE username=:user");
      $request1->bindParam(':browser',$browser);
      $request1->bindParam(':user',$user);
      $request1->execute();
      return true;
    }
    elseif($result != $browser){
      //Envoyer un mail + attendre la validation ce celui-ci
      $token = md5(uniqid(rand(), true));
      $request1=$db->prepare("UPDATE users SET token_delock=:token, compte_lock=1  WHERE username=:user");
      $request1->bindParam(':token',$token);
      $request1->bindParam(':user',$user);
      $request1->execute();
      echo "session:".$_SESSION['mail'];
      //mail_send_nav($_SESSION['mail'],$browser,$token);
      return false;
    }
    else{
      return true;
    }
  }

  //Fonction de delock de l'utilisateur
  //Si le token entrée correspond à un token de la bdd alors on delock de le compte + met la nouvelle IP et nouveau nav
  function delock($token,$ip,$browser){
    $SERVERNAME = 'localhost';
    $DBNAME = 'workshop';
    $USER = 'work';
    $PASS = 'Epsi2020!';
    $db = new PDO("mysql:host=localhost;dbname=".$DBNAME, $USER, $PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request=$db->prepare("SELECT id FROM users WHERE token_delock=:token");
    $request->bindParam(':token',$token);
    $request->execute();
    $result=$request->fetchAll();
    if (empty($result)) {
      header('Location: ../index.php');
    }
    else{
      $request1=$db->prepare("UPDATE users SET token_delock=NULL, last_ip=:ip, last_nav=:nav, compte_lock=0 WHERE id=:id");
      $request1->bindParam(':id',$result[0][0]);
      $request1->bindParam(':ip', $ip);
      $request1->bindParam(':nav', $browser);
      $request1->execute();
    }
  }
 ?>
