<?php 

    session_start();

    require_once('query/connection.php');   
   
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
    <link rel="stylesheet" href="css/reg_std.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">

</head>
<body>
<div class="container">
    <form action="query/reg_admin_db.php" method="post" class="form" class="form-control">
        
        <h1 class="h3 mt-1 mb-3 text-center fw-normal">สมัครสมาชิกสำหรับผู้ดูแลระบบ</h1>
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
              <label for="tel" class="form-label">เบอร์โทรศัพท์</label>
              <input type="text" class="form-control" name="tel"  required>
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