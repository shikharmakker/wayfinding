<?php 
include('Constants.php');
require("class.phpmailer.php");
require("class.smtp.php");


$user = $_POST['username'];
$q = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$user'");
$row = mysqli_fetch_assoc($q);
$email = $row['email'];
$api = md5(uniqid(rand()));
$query = mysqli_query($conn,"INSERT INTO forget_psw(username,email,api_key) VALUES ('$user','$email','$api')");


$sendMail = function($to, $subject, $message)
{
  $headers = 'From:noreply@vision.com'."\r\n"; 
  $mail = new PHPMailer();
        //$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try 
  {
      //Server settings
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host   = "smtp.iitd.ac.in";
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'ird12048';                 // SMTP username
      $mail->Password = 'gajiftiso';                           // SMTP password
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;                                    // TCP port to connect to
      $mail->addAddress($to);
      $mail->setFrom('ird12048@cse.iitd.ac.in.com', 'InNav');
      //$mail->addAddress("ayushi.nda@gmail.com");
      //$mail->AddEmbeddedImage("img/mail_header.jpg", "header", "mail_header.jpg"); 
      //$mail->AddEmbeddedImage("img/logo.png", "logo", "logo.png");
      //$mail->AddEmbeddedImage("img/footer.jpg", "footer", "footer.jpg");  
      //$mail->AddEmbeddedImage("img/profile.jpg", "profile", "profile.jpg"); 
      $mail->addReplyTo('ird12048@cse.iitd.ac.in.com', 'Information');

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $message;
      $mail->AltBody = $message;

      $mail->send();
      //echo "hello";
      echo "mail sent to $to";
  } 
  catch (Exception $e) 
  {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
};

$to = $email;
         $subject = "Password Recovery";
         $message="Your Password Recovery link \r\n";
         $message.="Click on this link to change your password \r\n";
         $message.="localhost/aims/pass.php?user=$user&key=$api \n \n \n";
    $sendMail($to,$subject,$message);
?>