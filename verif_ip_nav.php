<?php

include('config/config_pdo.php');
//Verife si le compte est lock
// echo "PDO bdd<br>";
// echo "nom d'utilisateur: ".$username."<br>";
// echo "user existe ? :".pdo_user_create($username)."<br>";
// echo "user lock ?: ".pdo_user_lock($username)."<br>";
if (!pdo_user_lock($username) || !pdo_user_create($username)) {
  //Verif de l'ip
  $ip = $_SERVER['REMOTE_ADDR'];
  //pdo_compare_ip($username,$ip);
  if (pdo_compare_ip($username,$ip)) {
    //verif du navigateur
    $arr_browsers = ["Opera", "Edge", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $user_browser = '';
    foreach ($arr_browsers as $browser) {
        if (strpos($agent, $browser) !== false) {
            $user_browser = $browser;
            break;
        }
    }

    switch ($user_browser) {
        case 'MSIE':
            $user_browser = 'Internet Explorer';
            break;
        case 'Trident':
            $user_browser = 'Internet Explorer';
            break;
        case 'Edge':
            $user_browser = 'Microsoft Edge';
            break;
    }
    if (pdo_compare_nav($username,$user_browser)) {
      header('Location: panel.php');
    }
    else{
      header('Location: index.php');
    }
  }
}
else{
  echo '<div class="alert alert-danger alert-dismissible fade show">
          <strong>Erreur!</strong> compte Bloqué veuillez vérifier vos mails
          <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>';
}

?>
