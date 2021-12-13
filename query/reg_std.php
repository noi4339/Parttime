<?php
        session_start();
require_once('connection.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
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
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query1 = "INSERT INTO user (email, password, f_name, l_name, tel, role)
                        VALUES ('$email', '$passwordenc', '$f_name', '$l_name', '$tel', 's')";
            if(mysqli_query($conn, $query1)){

            $query_user_id = "SELECT * FROM user WHERE email = '$email'";
            $result_user_id = mysqli_query($conn,$query_user_id);
            $row_user_id = mysqli_fetch_assoc($result_user_id);
            
            $user_id = $row_user_id["user_id"];

            $query2 = "INSERT INTO std_detail (user_id, skill_id, faculty_id, department_id, sex, age, std_id) 
                        VALUES ('$user_id', '$skill_id', '$faculty_id', '$department_id', '$sex', '$age', '$std_id')";

            $result22 = mysqli_query($conn, $query2);

            if ($result22){
              $_SESSION['success'] = "Successfully";
              header("Location: ../index.php");
            } else {
              $_SESSION['error'] = "Something went wrong";
              header("Location: ../index.php");
            }
          }
        }
?>