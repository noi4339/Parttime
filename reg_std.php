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
    <title>Sign up - Student Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reg_std.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400&display=swap" rel="stylesheet">

</head>
<body>
<div class="container">
    <form action="query/reg_std_db.php" method="post" class="form" class="form-control">
        <h1 class="h3 mt-1 mb-3 text-center fw-normal">สมัครสมาชิกสำหรับนักศึกษา</h1>

        <?php if (isset($_SESSION['success'])) : ?>
        <div class="w-100 success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])) : ?>
        <div class="w-100 error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
        <?php endif; ?>

        <div class="col-md-6 col-lg-12">
          <div class="row g-3">
            <div class="col-12 ">
              <label for="email" class="form-label" >Email</label>
              <input type="email" class="form-control" name="email" placeholder="student@mail.rmutt.ac.th" required>          
            </div>
            <div class="col-sm-6">
              <label for="password" class="form-label" >Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>

            <div class="col-sm-6">
              <label for="con_password" class="form-label" >Confirm Password</label>
              <input type="password" class="form-control" name="con_password" required>
            </div>

            <div class="col-sm-6">
              <label for="f_name" class="form-label" >ชื่อ</label>
              <input type="text" class="form-control" name="f_name"  required>
            </div>

            <div class="col-sm-6">
              <label for="l_name" class="form-label">นามสกุล</label>
              <input type="text" class="form-control" name="l_name"  required>
            </div>

            <div class="col-sm-8">
              <label for="std_id" class="form-label">รหัสนักศึกษา</label>
              <input type="text" class="form-control" name="std_id"  required>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8">
              <label for="tel" class="form-label">เบอร์โทรศัพท์</label>
              <input type="text" class="form-control" name="tel"  required>
            </div>

            <div class="col-sm-10">
              <label for="skill_id" class="form-label">ความถนัด</label>
              <select type="text"  name="skill_id" class="form-control" required>
              <option value="">-กรุณาเลือกความถนัด-</option>
                <?php foreach($result1 as $skill){?>
              <option value="<?php echo $skill["skill_id"];?>">
                <?php echo $skill["skill_id"]; ?>
              </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-sm-10">
              <label for="faculty_id" class="form-label">คณะ</label>
              <select type="text" name="faculty_id" id="faculty_id" class="form-control" required>
              <option select disable value="">-กรุณาเลือกคณะ-</option>
                <?php foreach($result2 as $faculty){?>
              <option value="<?=$faculty["faculty_id"]?>">
                <?=$faculty["faculty_name"] ?>
              </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-sm-10">
              <label for="department_id" class="form-label">สาขาวิชา</label>
              <select type="text" class="form-control" name="department_id" id="department_id" required>
              <option selected disabled>-กรุณาเลือกสาขาวิชา-</option>
              </select>
            </div>        

                <script type="text/javascript">
                  $('#faculty_id').change(function(){
                  var id_faculty = $(this).val();
                      $.ajax({
                      type: "POST",
                      url: "query/selectdep.php",
                      data: {id:id_faculty,function:'faculty_id'},
                      success: function(data){
                        console.log(data)
                          $('#department_id').html(data);

                        }
                      });
                    });
                </script>

            <div class="col-sm-3">
              <label for="age" class="form-label">อายุ</label>
              <input type="text" class="form-control" name="age" placeholder="" required>
            </div>

            <div class="col-sm-4">
              
              <label for="sex" class="form-label">เพศ</label>
              <select name="sex" class="form-control" id="sex" required>
              <option value="">-กรุณาเลือก-</option>
              <option value="ชาย">ชาย</option>
              <option value="หญิง">หญิง</option>
              </select>
            </div>
          </div>
        </div>
        <br>
        <input  type="submit" class=" d-grid gap-2 col-3 mx-auto mb-2 btn btn-primary btn-lg" name="submit" value="Submit">
        <a class="d-grid gap-2 col-5 mx-auto btn btn-secondary" href="index.php">Back to Login</a>  
    </form>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>