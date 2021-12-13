<?php 

    session_start();

    require_once "connection.php";   

    $skill = "SELECT * FROM skill ORDER BY skill_id asc" or die("Error:" . mysqli_error());
    $result1 = mysqli_query($conn, $skill);

    $faculty = "SELECT * FROM faculty ORDER BY faculty_id asc" or die("Error:" . mysqli_error());
    $result2 = mysqli_query($conn, $faculty);
    
    $department = "SELECT * FROM department ORDER BY department_id asc" or die("Error:" . mysqli_error());
    $result3 = mysqli_query($conn, $department); 

    if (isset($_POST['submit'])) {

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

        if ($user['email'] === $email) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query1 = "INSERT INTO user (email, password, f_name, l_name, tel, role)
                        VALUES ('$email', '$passwordenc', '$f_name', '$l_name', '$tel', 's')";
            $result11 = mysqli_query($conn, $query1);

            $user_id = "SELECT * FROM user WHERE user_id )";
            $result55 = mysqli_query($conn,$user_id);
            $id_user = $result55->fetch_assoc();

            $query2 = "INSERT INTO std_detail (std_detail_id, skill_id, faculty_id, department_id, sex, age, std_id) 
                        VALUES ('', '$id_user', '1', '1', '1', '1', '$age', '$std_id')";
            $result22 = mysqli_query($conn, $query2);
         /*       $query3 = "INSERT INTO std_detail (faculty_id)
                        VALUE ($faculty)";
            $result3 = mysqli_query($conn, $query3);

            $query4 = "INSERT INTO std_detail (department_id)
                        VALUE ($department)";
            $result4 = mysqli_query($conn, $query4);

            $query5 = "INSERT INTO std_detail (sex_id)
                       VALUE ($sex)";
            $result5 = mysqli_query($conn, $query5);

            $query6 = "INSERT INTO std_detail (std_id)
                        VALUE ($std_id)";
            $result6 = mysqli_query($conn, $query6); */

            if ($result11){
                $_SESSION['success'] = "Successfully";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your Email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        <br>
        <label for="f_name">ชื่อ</label>
        <input type="text" name="f_name" placeholder="Enter your firstname" required>
        <br>
        <label for="l_name">นามสกุล</label>
        <input type="text" name="l_name" placeholder="Enter your lastname" required>
        <br>
        <label for="tel">เบอร์โทร</label>
        <input type="text" name="tel" placeholder="Enter your lastname" required>
        <br>

        <label for="std_id">รหัสนักศึกษา</label>
        <input type="text" name="std_id" placeholder="Enter your lastname" required>
        <br>
        
        <?php $skill_id = (isset($fetch['ชื่อฟิลด์ในฐานข้อมูล'])) ? $fetch['ชื่อฟิลด์ในฐานข้อมูล'] : ''; ?>
        <label for="std_id">ความถนัด</label>
        <select class="form-control" name="skill_id" id="skill_id">
        <option value="จ่ายปลายงวด" <?php if($skill_id == "skill1") echo "selected"; ?> >ชาย</option>
        <option value="จ่ายต้นงวด" <?php if($skill_id == "1") echo "selected"; ?> >จ่ายต้นงวด (Beginning)</option>
        </select>
        <br>

        <label for="faculty_id">คณะ</label>
        <select type="text" name="faculty_id" class="form-control" required>
        <option value="">-กรุณาเลือก-</option>
       <?php foreach($result2 as $faculty){?>
        <option value="<?php echo $faculty["faculty_id"];?>">
        <?php echo $faculty["faculty_name"]; ?>
        </option>
        <?php } ?>
        </select>
        <br> 
        
        <label for="department_id">สาขาวิชา</label>
        <select type="text" name="department_id" class="form-control" required>
        <option value="">-กรุณาเลือก-</option>
       <?php foreach($result3 as $department){?>
        <option value="<?php echo $department["department_id"];?>">
        <?php echo $department["department_name"]; ?>
        </option>
        <?php } ?>
        </select>
        <br> 

        <label for="age">อายุ</label>
        <input type="text" name="age" placeholder="Enter your lastname" required>
        <br> 

        <label for="sex">เพศ</label>
        <select name="sex" id="sex" required>
        <option value="">-กรุณาเลือก-</option>
        <option value="M">ชาย</option>
        <option value="F">หญิง</option>
        </select>
        <br> 

        <input type="submit" name="submit" value="Submit">
    
    </form>

    <a href="index.php">Go back to index</a>
    
</body>
</html>