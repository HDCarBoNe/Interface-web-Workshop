<?php
$url = "https://haveibeenpwned.com/Passwords";
//$pwd = "testaezaeza";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, "Password=".$pwd);
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($curl);
curl_close($curl);
//regex = pwnedRow panel-collapse (.*[a-z])
$t = '["pwnedRow panel-collapse in"],["pwnedRow panel-collapse collapse"]';
preg_match_all('/pwnedRow\ panel-collapse\ (.*[a-z])/',$response,$status,PREG_PATTERN_ORDER);
$resultat = preg_replace("/pwnedRow\ panel-collapse\ /","",$status[0][0]);
if ($resultat == "in") {
  //echo "Le mot de passe est compromis";
  $_SESSION['pwned']=true;
}
else {
  //echo "Le mot de passe est sécurisé";
  $_SESSION['pwned']=false;
}
?>
