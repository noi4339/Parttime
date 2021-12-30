<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "parttimermutt");
 
        // mark email as verified
        $sql = "UPDATE user SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0)
        {
           $_SESSION['email'] = "$email";
           $_SESSION['error'] = "Verification code failed.";
           header("Location: ../email_verification.php");
          // die("Verification code failed.");
        }
        else{
          $_SESSION['success'] = "Successfully";
          header("Location: ../index.php");
          exit();
        }
    }
    if(isset($_POST["resend"])){
          $email = $_POST["email"];
        //Load Composer's autoloader
          require 'C:\xampp\htdocs\Parttime\vendor\autoload.php';
          $mail = new PHPMailer(true);

          try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
    
            //Send using SMTP
            $mail->isSMTP();
    
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
    
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
    
            //SMTP username
            $mail->Username = 'sirnoi4339@gmail.com';
    
            //SMTP password
            $mail->Password = '7895123noi';
    
            //Enable TLS encryption;
            $mail->SMTPSecure = 'tls';
    
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
    
            //Recipients
            $mail->setFrom('sirnoi4339@gmail.com', 'Parttimermutt');
    
            //Add a recipient
            $mail->addAddress($email, $name);
    
            //Set email format to HTML
            $mail->isHTML(true);
    
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
            
    
            $mail->send();
            // echo 'Message has been sent';
    
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    
            // connect with database
            $conn = mysqli_connect("localhost", "root", "", "parttimermutt");   
            // insert in users table
              $sql2 = "UPDATE user SET verification_code = '$verification_code' WHERE email = '" . $email . "'";
               $result2 = mysqli_query($conn, $sql2);
            
            header("Location: ../email_verification.php? email=" . $email);
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
 
?>
