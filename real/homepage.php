<?php
      session_start();
      if (!isset($_SESSION['admin_login'])) {
          header("location: ../index.php");
      }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Parttime-rmutt-</title>

  <link rel="stylesheet" href="../real/css/bootstrap.css">

  <link rel="stylesheet" href="../real/css/maicons.css">

  <link rel="stylesheet" href="../real/css/theme.css">
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container"> 
        <img class="navbar-brand" src="../assets/img/rmutt-logo.png" width="50px"  /> 
        <a href="index.html" class="navbar-brand"> 
          <span class="text-primary" >ระบบจัดหางานนอกเวลาสำหรับนักศึกษา </span><br>
          <span class="text-primary">มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</span>
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item active">
              <a href="index.html" class="nav-link">หน้าหลัก</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">หางาน</a>
            </li>
            <li class="nav-item">
              <a href="services.html" class="nav-link">เอกสาร</a>
            </li>
            <li class="nav-item">
              <a href="blog.html" class="nav-link">About Us</a>
            </li>
          </ul>

          <div class="ml-auto">
            <a href="#" class="btn btn-outline rounded-pill">Login</a>
          </div>
        </div>
      </div>
    </nav>
    
  </header>

  <script src="../real/js/jquery-3.5.1.min.js"></script>

  <script src="../real/js/bootstrap.bundle.min.js"></script>

  <script src="../real/js/theme.js"></script>

</body>
</html>