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
    $inName = $_POST['name']; 
    $inEmail = $_POST['email']; 
   $inPhone = $_POST['phone']; 
    $inMessage = $_POST['message']; 
// ------------------------------------------------------ //

	
	







// ------------------------------------------------------ //
// Iniciar Cliente PHP Mailer
// ------------------------------------------------------ //
$mail = new PHPMailer(true); 
$mail -> CharSet = "UTF-8";
// ------------------------------------------------------ //




try {
    //Server settings

    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Mailer = "smtp"; 
    $mail->Host = 'mail.colegiotecnologicodesuba.edu.co';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'admissions@colegiotecnologicodesuba.edu.co';                 // SMTP username
    $mail->Password = '11.62.0.35';                           // SMTP password

    $mail->Port =25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('admissions@colegiotecnologicodesuba.edu.co', 'Mensaje por Admisiones');
    //''
    // Add a recipient
    $mail->addAddress('admissions@colegiotecnologicodesuba.edu.co');
    //$mail->addAddress('wallamejorge@hotmail.com');  
    $mail->addReplyTo('admissions@colegiotecnologicodesuba.edu.co');
    $mail->addCC($inEmail);

    $message = file_get_contents('templates/emailAdmissions.html'); 
    $message = str_replace('{{ThisMessage}}', $inMessage, $message);
    $message = str_replace('{{ThisName}}', $inName, $message);
    $message = str_replace('{{ThisPhone}}', $inPhone, $message);
    $message = str_replace('{{ThisEmail}}', $inEmail, $message);


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje por Admisiones  - Colegio Tecnologico de Suba';
    $mail->Body    = 'Mensaje por Admisiones';
    $mail->msgHTML($message, dirname(__FILE__));
    $mail->AltBody = 'Mensaje por Admisiones';

    $mail->send();
    echo 'Message has been sent';
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
