<?php
/*
##############################################
# 1. Vérifier que le pwned du pwd se fait bien dans le cookie
# 2. Forward l'ip Client vers la page
#
#
#
###############################################
*/
session_start();
require __DIR__ . '/vendor/autoload.php';
use Sonata\GoogleAuthenticator\GoogleAuthenticator;
$g = new \Google\Authenticator\GoogleAuthenticator();
$salt = 'AIzaSyCLMj0MF5Y6B5hsN5B78bQrdel3jFkaATU';
$username = "Administrateur";
$secret = $username.$salt;
//       **GENERER lE QR-CODE **
//echo '<img src="'.$g->getURL($username, 'portail.docker.dylanpriou.fr', $secret).'" />';

if(isset($_POST['login']) && isset($_POST['pass']) ){
  $username =$_POST['login'];
  $pwd = $_POST['pass'];
  //$code = $_POST['code'];
  //include('config/config_ldap.php');
  $adServer = "ldap://192.168.4.120";
  $ldap = ldap_connect($adServer);
  $ldaprdn = 'COVID'."\\".$username;
  if ($ldap)
  {
    // on s'authentifie en tant que super-utilisateur, ici, ldap_admin
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERISON_3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $r=ldap_bind($ldap,$ldaprdn,$pwd);
    if ($r) {
      //echo "Connexion LDAP réussie ! <br>";
      $filter = "(sAMAccountName=".$username.")";
      //echo $filter."<br>";
      $result = ldap_search($ldap,'OU=UserClinique,DC=COVID,DC=plague',$filter);
      //var_dump($result);
      ldap_sort($ldap,$result,"sn");
      $info = ldap_get_entries($ldap,$result);
      //var_dump($info);
      for($i=0; $i<$info["count"]; $i++){
        if ($info['count'] > 1) {
          break;
        }
        /*if($g->checkCode($secret, $code)){
          include_once('testpwd.php');
          include_once('verif_ip_nav');
        }
        else {
          echo'<div class="alert alert-danger alert-dismissible fade show">
                  <strong>Erreur!</strong> Code GoogleAuthenticator Incorrecte.
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>';
        }*/
        // echo "<p> On accède à <strong> ".$info[$i]["sn"][0].", ".$info[$i]["givenname"][0]."</strong></p>";
        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";
        // $userDn= $info[$i]["distinguishedname"][0];
        $_SESSION['nom']=$info[$i]["sn"][0];
        $_SESSION['prenom']=$info[$i]["givenname"][0];
        $_SESSION['mail']=$info[$i]["userprincipalname"][0];
//######################################################################
        $_SESSION['mail']="dylan.priou.android@gmail.com";
//######################################################################
        include_once('testpwd.php');
        include_once('verif_ip_nav.php');
      }
    }
    else {
      echo'<div class="alert alert-danger alert-dismissible fade show">
              <strong>Erreur!</strong> Utilisateur ou mot de passe incorrect...
              <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>';
    }

    // Ici les opérations à effectuer
    //echo "Déconnexion...<br>";
    ldap_close($ds);
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/login/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/login/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/fonts/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/login/animate.css">
	<link rel="stylesheet" type="text/css" href="css/login/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="css/login/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="css/login/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/login/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/login/util.css">
	<link rel="stylesheet" type="text/css" href="css/login/main.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-26">
						Gestionnaire patients
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="login">
						<span class="focus-input100" data-placeholder="COVID\nom d'utilisateur"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Mot de passe"></span>
					</div>

          <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="code">
						<span class="focus-input100" data-placeholder="Code Google Authenticator"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Se connecter
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<script src="js/login/jquery-3.2.1.min.js"></script>
	<script src="js/login/animsition.min.js"></script>
	<script src="js/login/popper.js"></script>
	<script src="js/login/bootstrap.min.js"></script>
	<script src="js/login/select2.min.js"></script>
	<script src="js/login/moment.min.js"></script>
	<script src="js/login/daterangepicker.js"></script>
	<script src="js/login/countdowntime.js"></script>
	<script src="js/login/main.js"></script>
</body>
</html>
