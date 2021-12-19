<?php
        session_start();
require_once('connection.php');
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $tel = $_POST['tel'];

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
            $passwordenc = md5($password);
            $query1 = "INSERT INTO user (email, password, f_name, l_name, tel, role)
                        VALUES ('$email', '$passwordenc', '$f_name', '$l_name', '$tel', 'a')";
            mysqli_query($conn, $query1)

            if ($query1){
              $_SESSION['success'] = "Successfully";
              header("Location: ../index.php");
            } else {
              $_SESSION['error'] = "Something went wrong";
              header("Location: ../index.php");
            }
          }
        }
?>