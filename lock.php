<?php
  $token=$_GET['token'];
  $ip = $_SERVER['REMOTE_ADDR'];
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
  include 'config/config_pdo.php';
  delock($token,$ip,$user_browser);
  header('Location: index.php');
?>
