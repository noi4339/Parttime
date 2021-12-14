<?php 

    session_start();

    require_once('query/connection.php');   

    $skill = "SELECT * FROM skill ORDER BY skill_id asc" or die("Error:" . mysqli_error());
    $result1 = mysqli_query($conn, $skill);

    $faculty = "SELECT * FROM faculty ";
    $result2 = mysqli_query($conn, $faculty);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">

</head>
<body>

    <form action="query/reg_std.php" method="post">

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="@mail.rmutt.ac.th" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <br>
        <label for="f_name">ชื่อ</label>
        <input type="text" name="f_name"  required>
        <br>
        <label for="l_name">นามสกุล</label>
        <input type="text" name="l_name"  required>
        <br>
        <label for="tel">เบอร์โทร</label>
        <input type="text" name="tel"  required>
        <br>

        <label for="std_id">รหัสนักศึกษา</label>
        <input type="text" name="std_id"  required>
        <br>

        <label for="skill_id">ความถนัด</label>
        <select type="text" name="skill_id" class="form-control" required>
        <option value="">-กรุณาเลือกความถนัด-</option>
       <?php foreach($result1 as $skill){?>
        <option value="<?php echo $skill["skill_id"];?>">
        <?php echo $skill["skill_id"]; ?>
        </option>
        <?php } ?>
        </select>
        <br> 

        <label for="faculty_id">คณะ</label>
        <select type="text" name="faculty_id" id="faculty_id" class="form-control" required>
        <option value="">-กรุณาเลือกคณะ-</option>
       <?php foreach($result2 as $faculty){?>
        <option value="<?=$faculty["faculty_id"]?>">
        <?=$faculty["faculty_name"] ?>
        </option>
        <?php } ?>
        </select>
        <br> 

        <label for="department_id">สาขาวิชา</label>
        <select type="text" class="form-control" name="department_id" id="department_id">
        <option selected disabled value="">-กรุณาเลือกสาขาวิชา-</option>
        </select>
        <br>

        <script type="text/javascript">
          $('#faculty_id').change(function(){
          var id_faculty = $(this).val();
              $.ajax({
              type: "POST",
              url: "selectdep.php",
              data: {id:id_faculty,function:'faculty_id'},
              success: function(data){
                 console.log(data)
                  $('#department_id').html(data);

                }
              });
            });
        </script>

        <label for="age">อายุ</label>
        <input type="text" name="age" placeholder="Enter your lastname" required>
        <br> 

        <label for="sex">เพศ</label>
        <select name="sex" id="sex" required>
        <option value="">-กรุณาเลือก-</option>
        <option value="ชาย">ชาย</option>
        <option value="หญิง">หญิง</option>
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