<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use GeoIp2\Database\Reader;
//$mail = new PHPMailer(true);
require '/var/www/html/vendor/autoload.php';
//mail_send_ip('dylan.priou.android@gmail.com','86.217.56.90','12345');
mail_send_nav('dylan.priou.android@gmail.com','Edge','111111');
function mail_send_ip($email,$ip,$token){
  $mail = new PHPMailer(true);

  $reader = new Reader('GeoLite2-City.mmdb');
  $record = $reader->city($ip);

  $body = '<html>
            <title>Nouvelle Connexion</title>
            <body>
              Bonjour,<br>
              Dans le cadre de notre politique de sécurité, nous vous prévenons lorsque nous détectons une nouvelle connexion à votre compte Resillience34.<br>
              Nous avons remarqué une nouvelle connexion à votre compte Resillience34 depuis:<br>
              IP = '.$ip.'<br>
              Location = ['.$record->country->isoCode.'] '.$record->city->name.'<br>
              Latitude = '.$record->location->latitude.'<br>
              Longitude = '.$record->location->longitude.'<br>
              <br>
              Si les informations ci-dessus vous semblent familières, vous pouvez cliquez sur le lien si-dessous pour dévérouiller votre compte.
              <a href="https://covid.mignon.chat/lock.php?='.$token.'">Dévérouiller mon compte</a><br><br>

              Si vous ne vous êtes pas récement connecté à votre compte Resillience34 depuis '.$record->country->name.', il serait prudent de réinitialiser votre mot de passe en demandant à l\'administrateur de votre réseau.
              <br>
              <br>
              L\'équipe Résillience34
            </body>
          </html>';

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = '';                     // SMTP username
      $mail->Password   = '';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('dylan.priou.android@gmail.com', 'Resillience34');
      $mail->addAddress($email);     // Add a recipient

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Nouvelle connexion';
      $mail->Body    = $body;

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function mail_send_nav($email,$nav,$token){
  echo "SEND MAIL NAV";
  $mail = new PHPMailer(true);
  $body = '<html>
            <title>Nouvelle Connexion</title>
            <body>
              Bonjour,<br>
              Dans le cadre de notre politique de sécurité, nous vous prévenons lorsque nous détectons une nouvelle connexion à votre compte Resillience34.<br>
              Nous avons remarqué une nouvelle connexion à votre compte Resillience34 depuis:<br>
              Navigateur = '.$nav.'<br>
              <br>
              Si les informations ci-dessus vous semblent familières, vous pouvez cliquez sur le lien si-dessous pour dévérouiller votre compte.
              <a href="https://covid.mignon.chat/lock.php?token='.$token.'">Dévérouiller mon compte</a><br><br>

              Si vous ne vous êtes pas récement connecté à votre compte Resillience34 depuis '.$nav.', il serait prudent de réinitialiser votre mot de passe en demandant à l\'administrateur de votre réseau.
              <br>
              <br>
              L\'équipe Résillience34
            </body>
          </html>';

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'dylan.priou.android@gmail.com';                     // SMTP username
      $mail->Password   = 'kcuxsutuhbiqokcy';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('dylan.priou.android@gmail.com', 'Resillience34');
      $mail->addAddress($email);     // Add a recipient

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Nouvelle connexion';
      $mail->Body    = $body;

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
 ?>
