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
<title>Sign up - Organization Page</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/reg_org.css">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400&display=swap" rel="stylesheet">
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
function initMap() {
  // The location of Uluru
  const uluru = { lat: 13.736717, lng: 100.523186 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 16,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}</script>


</head>
<body onload="init();">
<div class="container">

<form action="query/reg_std_db.php" method="post" class="form" class="form-control">
    <h1 class="h3 mt-1 mb-3 text-center fw-normal">สมัครสมาชิกสำหรับสถานประกอบการ</h1>

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
          <label for="tel" class="form-label">เบอร์โทรศัพท์</label>
          <input type="text" class="form-control" name="tel"  required>
        </div>

        <div class="col-12">
          <label for="l_name" class="form-label">ชื่อสถานประกอบการ</label>
          <input type="text" class="form-control" name="l_name"  required>
        </div>

        <div class="col-12">
          <label for="name_org" class="form-label">ที่อยู่สถานประกอบการ</label>
          <textarea class="form-control" id="form4Example3" rows="4"></textarea>
        </div>
        
        <h5>แผนที่</h5>
        <div id='map' style='width: 400px; height: 300px;'></div>

        <h5>หลักฐานยืนยันตัวตนสถานประกอบการ</h5>
        <div class="col-12">
          <label for="name_org" class="form-label">ก.พ.20</label>
          <input type="file" class="form-control" id="customFile" />
        </div>
        <div class="col-12">
          <label for="name_org" class="form-label">หนังสือหรับรองการจัดตั้ง</label>
          <input type="file" class="form-control" id="customFile" />
        </div>
        <div class="col-12">
          <label for="name_org" class="form-label">สำเนาบัตรประชาชนเจ้าของสถานประกอบการ</label>
          <input type="file" class="form-control" id="customFile" />
        </div>
        <br>

      </div>
    </div>
    <br>
    <input  type="submit" class=" d-grid gap-2 col-3 mx-auto mb-2 btn btn-primary btn-lg" name="submit" value="Submit">
    <a class="d-grid gap-2 col-5 mx-auto btn btn-secondary" href="index.php">Back to Login</a>  
</form>
</div>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmNL2PFEelX2dLJVwjF0iLOQtta6A2Dig&callback=initMap&v=weekly"
      async
    ></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>