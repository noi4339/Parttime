<?php
        session_start();
        require_once('connection.php');
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $tel = $_POST['tel'];
        $skill_id = $_POST['skill_id'];
        $faculty_id = $_POST['faculty_id'];
        $department_id = $_POST['department_id'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $std_id = $_POST['std_id'];
        

        $user_check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['email'] == $email) {
          $_SESSION['error'] = 'Email ถูกใช้งานแล้ว';
          header("location: ../reg_std.php");
        } else if ($password != $c_password) {
          $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
          header("location: ../reg_std.php");
        } else {
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
              $passwordenc = md5($password);
              // insert in users table
              $sql1 = "INSERT INTO user (email, password, f_name, l_name, tel, role, verification_code, email_verified_at)
                        VALUES ('$email', '$passwordenc', '$f_name', '$l_name', '$tel', 'std', '$verification_code', 'NULL')";
              if(mysqli_query($conn, $sql1)){

                $query_user_id = "SELECT * FROM user WHERE email = '$email'";
                $result_user_id = mysqli_query($conn,$query_user_id);
                $row_user_id = mysqli_fetch_assoc($result_user_id);
                
                $user_id = $row_user_id["user_id"];
                $sql2 = "INSERT INTO std_detail (user_id, skill_id, faculty_id, department_id, sex, age, std_id) 
                             VALUES ('$user_id', '$skill_id', '$faculty_id', '$department_id', '$sex', '$age', '$std_id')";
                 $result2 = mysqli_query($conn, $sql2);
              }
              header("Location: ../email_verification.php? email=" . $email);
              exit();
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }


            // $query1 = "INSERT INTO user (email, password, f_name, l_name, tel, role,status)
            //             VALUES ('$email', '$passwordenc', '$f_name', '$l_name', '$tel', 's', '0')"; 
            
            // if(mysqli_query($conn, $query1)){

            // $query_user_id = "SELECT * FROM user WHERE email = '$email'";
            // $result_user_id = mysqli_query($conn,$query_user_id);
            // $row_user_id = mysqli_fetch_assoc($result_user_id);
            
            // $user_id = $row_user_id["user_id"];
            // $query2 = "INSERT INTO std_detail (user_id, skill_id, faculty_id, department_id, sex, age, std_id) 
            //              VALUES ('$user_id', '$skill_id', '$faculty_id', '$department_id', '$sex', '$age', '$std_id')";

            //  $result2 = mysqli_query($conn, $query2);

            // if ($result2){
            //   $_SESSION['success'] = "Successfully";
            //   header("Location: ../index.php");
            // } else {
            //   $_SESSION['error'] = "Something went wrong";
            //   header("Location: ../index.php");
            // }
          // }
        }
?>
