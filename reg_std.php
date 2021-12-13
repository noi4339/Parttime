<?php 

    session_start();

    require_once('query/connection.php');   

    $skill = "SELECT * FROM skill ORDER BY skill_id asc" or die("Error:" . mysqli_error());
    $result1 = mysqli_query($conn, $skill);

    $faculty = "SELECT * FROM faculty ORDER BY faculty_id asc" or die("Error:" . mysqli_error());
    $result2 = mysqli_query($conn, $faculty);
    
    $department = "SELECT * FROM department ORDER BY department_id asc" or die("Error:" . mysqli_error());
    $result3 = mysqli_query($conn, $department); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <form action="query/reg_std.php" method="post">

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
        <input type="text" name="std_id" placeholder="กรอกรหัสนักศึกษา" required>
        <br>
        
        <label for="skill_id">ความถนัด</label>
        <select type="text" name="skill_id" class="form-control" required>
        <option value="">-กรุณาเลือก-</option>
       <?php foreach($result1 as $skill){?>
        <option value="<?php echo $skill["skill_id"];?>">
        <?php echo $skill["skill_id"]; ?>
        </option>
        <?php } ?>
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
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>