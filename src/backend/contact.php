<?php




// ------------------------------------------------------ //
// Set Headers
// ------------------------------------------------------ //
    header('Access-Control-Allow-Origin: *'); 
// ------------------------------------------------------ //







// ------------------------------------------------------ //
// Lib and Imports
// ------------------------------------------------------ //
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\POP3;
    use PHPMailer\PHPMailer\OAuth;      
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/POP3.php';
    require 'PHPMailer/OAuth.php';
// ------------------------------------------------------ //








// ------------------------------------------------------ //
// General Settings
// ------------------------------------------------------ //       
   date_default_timezone_set('Etc/UTC');
// ------------------------------------------------------ //



  

// ------------------------------------------------------ //
// Variables y Constantes
// ------------------------------------------------------ //       
    $inName = $_GET['name']; 
    $inEmail = $_GET['email']; 
    $inPhone = $_GET['phone']; 

/*
    $inName  = "Jorge";
    $inEmail = "wallamejorge@hotmail.com";
    $inPhone = "555-555-5555";
    */
// ------------------------------------------------------ //








// ------------------------------------------------------ //
// Iniciar Cliente PHP Mailer
// ------------------------------------------------------ //
$mail = new PHPMailer(true); 
$mail -> CharSet = "UTF-8";
// ------------------------------------------------------ //




try {
    //Server settings

    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Mailer = "smtp"; 
    $mail->Host = 'a2plcpnl0095.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contact@autostudio-cr.com';                 // SMTP username
    $mail->Password = 'mail/wizard1.html';                           // SMTP password

    $mail->Port =25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('contact@autostudio-cr.com', 'Landing Page');
    // Add a recipient
    $mail->addAddress('contact@autostudio-cr.com');
    $mail->addReplyTo('contact@autostudio-cr.com');  
    $message = file_get_contents('templates/emailAdmissions.html'); 
    $message = str_replace('{{ThisName}}', $inName, $message);
    $message = str_replace('{{ThisPhone}}', $inPhone, $message);
    $message = str_replace('{{ThisEmail}}', $inEmail, $message);


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'AutoStudio  - Contacto por Landingpage';
    $mail->Body    = 'AutoStudio  - Contacto por Landingpage';
    $mail->msgHTML($message, dirname(__FILE__));
    $mail->AltBody = 'AutoStudio  - Contacto por Landingpage de '.$inName.'\n Email : '.$inEmail.' \n Phone : '.$inPhone;

    $mail->send();
    
    
    echo "Pronto nos contactaremos contigo ";

} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo '<br>';
    echo 'Name : '. $inName;
     echo '<br>';
    echo 'Email : '. $inEmail;
     echo '<br>';
    echo 'Phone : '. $inPhone;
     echo '<br>';
    echo 'Message : '. $inMessage;
}    



?>




