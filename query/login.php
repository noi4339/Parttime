<?php 

    session_start();

  

    if (isset($_POST['email'])) {

        include('connection.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordenc = md5($password);
        
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$passwordenc'";
         $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user'] = $row['f_name'] . " " . $row['l_name'];
            $_SESSION['role'] = $row['role'];
            

            if ($row['email_verified_at'] == null ) {
                $_SESSION['error'] = "Please verify your email <a href='email_verification.php? email=" . $email . "'>from here</a>";
               header("Location: ../index.php");
               exit();
              // die(" <br>Please verify your email <a href='../email_verification.php? email=" . $email . "'>from here</a>");
            }              
            if ($_SESSION['role'] == 'std') {
                header("Location: ../home_page.php");
          
            }
            if ($_SESSION['role'] == 'org') {
                header("Location: ../org_page.php");
            }
            if ($_SESSION['role'] == 'admin') {
              header("Location: ../admin_page.php");
          }
      
        } else {
            $_SESSION['error'] = "Email หรือ Password ไม่ถูกต้อง";
            header("Location: ../index.php");
        }

    } else {
        header("Location: ../index.php");
    }


?>