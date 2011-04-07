<?php

  if ((! isset($_POST['phone_model'])) || (! isset($_POST['android_version'])) ||
      (! isset($_POST['thread_name'])) || (! isset($_POST['error_message'])) || (! isset($_POST['callstack'])))
      die('Bad parameters');
  
  require('includes/sqlmanager.class.php');
  $db = new SQLManager();
  
  if (isset($_POST['version'])) $version = $db->protect($_POST['version']);
  else $version = 'Unknown';

  $pm =         $db->protect($_POST['phone_model']);
  $av =         $db->protect($_POST['android_version']);
  $tn =         $db->protect($_POST['thread_name']);
  $em =         $db->protect($_POST['error_message']);
  $callstack =  $db->protect($_POST['callstack']);
  $cs = $_POST['callstack'];
  $ip = $_SERVER["REMOTE_ADDR"];
  $host = gethostbyaddr($ip);
  
  $query = $db->query("SELECT COUNT(*) AS nbr FROM andro_crashreport WHERE crCallstack='$callstack'");
  $data = mysql_fetch_object($query);
  
  $bool = 0;
  
  if ($data->nbr == 0)
  {
    $bool = 1;
  }
  
      $query = $db->query("INSERT INTO andro_crashreport (crPhoneModel, crAndroidVersion, crThreadName, crErrorMessage, crCallstack, crTime, crAndroIRCVersion) VALUES('$pm', '$av', '$tn', '$em', '$callstack', NOW(), '$version')");

      if ( !preg_match('#sdk#', $pm))
      {
          /* Ce n'est pas l'émulateur ... */
          require_once 'includes/libmail.class.php';

          $mail = new Mail();
          $id = mysql_insert_id();

          $mail->From('noreply@androirc.com');
          $mail->To('contact@androirc.com');

          $mail->Subject("[Crash] Rapport de crash #$id ($version)");

    $message = "Nouveau rapport de crash :

            Phone model : $pm
            Android version : $av
            AndroIRC version : $version
            Thread name : $tn
            Error message : $em
            IP Address: $ip
            Host: $host
            Callstack : 
          
            $cs

    Vous pouvez supprimer ce rapport directement via le lien suivant : http://www.androirc.com/admin/crashes.php?rm=$id
    --
    AndroIRC";

          $mail->Body($message);

          $mail->Send();
      }

      if (mysql_affected_rows() == 1) echo 'ok';
    //}
?>
