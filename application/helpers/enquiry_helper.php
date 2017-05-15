<?php
function SendMail( $ToEmail,$subject,$MessageHTML, $MessageTEXT,$attachment_array=NULL ) {
    $Mail = new PHPMailer();
    $Mail->IsSMTP(); // Use SMTP
    $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server     //smtp.mandrillapp.com        //smtp.gmail.com
    $Mail->SMTPDebug   = 1; // 2 to enable SMTP debug information
    $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
    $Mail->SMTPSecure  = "tls"; //Secure conection
    $Mail->Port        = 587; // set the SMTP port   587   465
    $Mail->Username    = 'encirclet@gmail.com'; // SMTP account username //beheer@penthion.nl
    $Mail->Password    = 'encircle@t'; // SMTP account password      //CLubwFIodDrL8ykNdVxCiw
    $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
    $Mail->CharSet     = 'UTF-8';
    $Mail->Encoding    = '8bit';
    $Mail->Subject     = $subject;
    $Mail->ContentType = 'text/html; charset=utf-8\r\n';
    $Mail->From        = 'encirclet@gmail.com';
    $Mail->FromName    = 'encirclet';
    $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line
    $Mail->AddAddress( $ToEmail ); // To:
    $Mail->isHTML( TRUE );
    $Mail->Body    = $MessageHTML;
    $Mail->AltBody = $MessageTEXT;
    $Mail->Send();
    $Mail->SmtpClose();

    if ( $Mail->IsError() ) { // ADDED - This error checking was missing
      return FALSE;
    }
    else {
      return TRUE;
    }
  }
?>
