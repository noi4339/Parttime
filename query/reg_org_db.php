<?php
        session_start();
        date_default_timezone_set('Asia/Bangkok');
        $date = date("Y-m-d-");
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
        $org_name = $_POST['org_name'];
        $add_org = $_POST['add_org'];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
        

        // Upload PP20
        $PP20 = $_FILES['PP20']['name'];
        $PP20_path = "../file/PP20/";
        $PP20_type = strrchr($_FILES['PP20']['name'],".");
        
        $PP20_numrand = (mt_rand(1000,9999));
        $PP20_newname = "PP20-".$date.$PP20_numrand.$PP20_type;
        $PP20_path_copy = $PP20_path.$PP20_newname;
        $PP20_path_link = "../file/PP20/".$PP20_newname;

        $PP20_exten = pathinfo($PP20,PATHINFO_EXTENSION);
        $PP20_size = $_FILES['PP20']['size'];
        //---------------------------------

        // Upload affidavit
        $affidavit = $_FILES['affidavit']['name'];
        $affidavit_path = "../file/affidavit/";
        $affidavit_type = strrchr($_FILES['affidavit']['name'],".");

        $affidavit_numrand = (mt_rand(1000,9999));
        $affidavit_newname = "affidavit-".$date.$affidavit_numrand.$affidavit_type;
        $affidavit_path_copy = $affidavit_path.$affidavit_newname;
        $affidavit_path_link = "../file/affidavit/".$affidavit_newname;

        $affidavit_exten = pathinfo($affidavit,PATHINFO_EXTENSION);
        $affidavit_size = $_FILES['affidavit']['size'];
        //---------------------------------

        // Upload idcard_org
        $idcard_org = $_FILES['idcard_org']['name'];
        $idcard_org_path = "../file/idcard_org/";
        $idcard_org_type = strrchr($_FILES['idcard_org']['name'],".");

        $idcard_org_numrand = (mt_rand(1000,9999));
        $idcard_org_newname = "idcard_org-".$date.$idcard_org_numrand.$idcard_org_type;
        $idcard_org_path_copy = $idcard_org_path.$idcard_org_newname;
        $idcard_org_path_link = "../file/idcard_org/".$idcard_org_newname;

        $idcard_org_exten = pathinfo($idcard_org,PATHINFO_EXTENSION);
        $idcard_org_size = $_FILES['idcard_org']['size'];
        


        $user_check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['email'] == $email) {
          $_SESSION['error'] = 'Email ถูกใช้งานแล้ว';
          header("location: ../reg_org.php");

        } else if ($password != $c_password) {
          $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
          header("location: ../reg_org.php");

        } else if (!in_array($PP20_exten,['pdf','png','jpg'])) {
          $_SESSION['error'] = 'รูปแบบไฟล์ ก.พ.20 .PDF .PNG .JPG เท่านั้น';
          header("location: ../reg_org.php");
        } else if ($_FILES['PP20']['size'] > 10000000) {
          $_SESSION['error'] = 'ขนาดไฟล์ ก.พ.20 ไม่เกิน 10 MB';
          header("location: ../reg_org.php");

        } else if (!in_array($affidavit_exten,['pdf','png','jpg'])) {
          $_SESSION['error'] = 'รูปแบบไฟล์ หนังสือหรับรองการจัดตั้ง .PDF .PNG .JPG เท่านั้น';
          header("location: ../reg_org.php");
        } else if ($_FILES['PP20']['size'] > 10000000) {
          $_SESSION['error'] = 'ขนาดไฟล์ หนังสือหรับรองการจัดตั้ง ไม่เกิน 10 MB';
          header("location: ../reg_org.php");

        } else if (!in_array($idcard_org_exten,['pdf','png','jpg'])) {
          $_SESSION['error'] = 'รูปแบบไฟล์ สำเนาบัตรประชาชนเจ้าของสถานประกอบการ .PDF .PNG .JPG เท่านั้น';
          header("location: ../reg_org.php");
        } else if ($_FILES['PP20']['size'] > 10000000) {
          $_SESSION['error'] = 'ขนาดไฟล์ สำเนาบัตรประชาชนเจ้าของสถานประกอบการ ไม่เกิน 10 MB';
          header("location: ../reg_org.php");
          
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
                        VALUES ('$email', '$passwordenc', '$f_name', '$l_name', '$tel', 'org', '$verification_code', '0000-00-00 00:00:00')";
              if(mysqli_query($conn, $sql1)){

                $query_user_id = "SELECT * FROM user WHERE email = '$email'";
                $result_user_id = mysqli_query($conn,$query_user_id);
                $row_user_id = mysqli_fetch_assoc($result_user_id);
                
                $user_id = $row_user_id["user_id"];
                $sql2 = "INSERT INTO org_detail (user_id, org_name, add_org, PP20, affidavit, idcard_org, lat, lng ) 
                             VALUES ('$user_id', '$org_name', '$add_org', '$PP20_newname', '$affidavit_newname', '$idcard_org_newname', '$lat', '$lng')";
                $result2 = mysqli_query($conn, $sql2);
                if($result2){
                  move_uploaded_file($_FILES['PP20']['tmp_name'],$PP20_path_copy);
                  move_uploaded_file($_FILES['affidavit']['tmp_name'],$affidavit_path_copy);
                  move_uploaded_file($_FILES['idcard_org']['tmp_name'],$idcard_org_path_copy);
                  
                }
              }
              header("Location: ../email_verification.php? email=" . $email);
              exit();
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
        }
?>
