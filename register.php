<?php 
include('Constants.php');
require("class.phpmailer.php");
require("class.smtp.php");

  $first = $_POST["firstname"];
  $last = $_POST["lastname"];
  $psw = $_POST["password"];
  $email = $_POST["email"];
  $emp = $_POST['employee'];
  $confirm=md5(uniqid(rand()));
  $user = $first.$last;
  $q = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$user'");
  $num = mysqli_num_rows($q);
  if($num == 1){
    print_r($num);
    die;
  }
  $query = mysqli_query($conn,"INSERT INTO temp_admin (username,password,firstname,lastname,email,confirm) VALUES ('$user','$psw','$first','$last','$email','$confirm')");
  $sql2="INSERT INTO admin(firstname,lastname,email,username,password,employee_id)VALUES('$first','$last','$email','$user','$psw','$emp')";
  $result2=mysqli_query($conn,$sql2);
  // send e-mail to ...
// echo "hello";
         //$from = 'shikharmakker@gmail.com';

   

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
         $subject = "Your confirmation link here";
         $message="Your Comfirmation link \r\n";
         $message.="Click on this link to activate your account \r\n";
         $message.="10.17.50.43/wayfinding/confirmation.php?passkey=$confirm \n \n \n";
         $message.="<br>";
         $message.="Your username: $user";
         $message.="<br>";
         $message.="Your password: $psw \n";
    $sendMail($to,$subject,$message);



      ?>
