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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/reg_std.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400&display=swap" rel="stylesheet">

</head>
<body>
<h1 class="h3 mt-1 mb-3 mt-4 text-center fw-normal">สมัครสมาชิกสำหรับนักศึกษา</h1>
<div class="container">
    <form action="query/reg_std_db.php" method="post">

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
              <input type="email" class="form-control" name="email" 
              pattern="^([\w]*[\w\.]*(?!\.)@mail.rmutt.ac.th)" 
                      oninvalid="this.setCustomValidity('กรุณากรอก Email นักศึกษา')"
                      oninput="this.setCustomValidity('')"
                      placeholder="studentid@mail.rmutt.ac.th">          
            </div>
            <div class="col-sm-6">
              <label for="password" class="form-label" >Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>

            <div class="col-sm-6">
              <label for="c_password" class="form-label" >Confirm Password</label>
              <input type="password" class="form-control" name="c_password" required>
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
              
              <select type="text" name="skill_id" class=" selectpicker col-sm-12" multiple required
                      title="-กรุณาเลือกความถนัด-"
                      data-container="body"
                      data-max-options="5"
                      data-max-options-text="เลือก 5 รายการครบแล้ว"
                      data-live-search="true" 
                      data-selected-text-format="count > 5" >
              <optgroup label="Picnic" >
                <option >Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
              </optgroup>
              <optgroup label="Camping">
                <option>Tent</option>
                <option>Flashlight</option>
                <option>Toilet Paper</option>
              </optgroup>
              </select>
            </div>

            <div class="col-sm-10">
              <select type="text"  name="skill_id" class="form-control " required>
              <option value="">-กรุณาเลือกความถนัด 2-</option>
                <?php foreach($result1 as $skill){?>
              <option value="<?php echo $skill["skill_id"];?>">
                <?php echo $skill["skill_id"]; ?>
              </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-sm-10">
              <select type="text"  name="skill_id" class="form-control" required>
              <option value="">-กรุณาเลือกความถนัด 3-</option>
                <?php foreach($result1 as $skill){?>
              <option value="<?php echo $skill["skill_id"];?>">
                <?php echo $skill["skill_id"]; ?>
              </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-sm-10">
              <label for="faculty_id" class="form-label">คณะ</label>
              <select type="text" name="faculty_id" id="faculty_id" class="form-select" required>
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
              <select type="text" class="form-select" name="department_id" id="department_id" required>
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

            <div class="col-sm-5">
              
              <label for="sex" class="form-label">เพศ</label>
              <select name="sex" class="form-select" id="sex" required>
              <option value="">-กรุณาเลือก-</option>
              <option value="ชาย">ชาย</option>
              <option value="หญิง">หญิง</option>
              </select>
            </div>
          </div>
        </div>
        <br>
        <input  type="submit" class=" d-grid gap-2 col-3 mx-auto mb-2 btn btn-primary " name="submit" value="Submit">
        <a class="d-grid gap-2 col-5 mx-auto btn btn-secondary" href="index.php">Back to Login</a>  
    </form>
    <p class="mt-5 mb-1 text-muted text-center">© 2021 ParttimeRMUTT</p>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

<?php 
              
    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
      unset($_SESSION['error']);
      unset($_SESSION['success']);
    }

?>
                      <!-- pattern="^([\w]*[\w\.]*(?!\.)@mail.rmutt.ac.th)" 
                      oninvalid="this.setCustomValidity('กรุณากรอก Email นักศึกษา')"
                      oninput="this.setCustomValidity('')" -->