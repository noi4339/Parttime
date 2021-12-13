<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login ParttimeRMUTT</title>

    <link href="signin.css" rel="stylesheet">
    <link href="style.css", rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">
    <style>
    body {
    font-family: Kanit;
    }
    </style>
    <!--style="background-color: #73ACD6-->
</head>
<body class="text-center" style="background-color: #73ACD6">
    
    <main class="container">
        <img class="mb-1 mt-4" src="img/rmutt-logo.png"  width="80px">

        <h1 >ระบบจัดหางานนอกเวลาสำหรับนักศึกษา </h1>
        <h2 >มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี </h2>
        <br>
    <form action="login.php" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="btn form-signin" style="background-color: #B8D1E4">
                
        <h1 class="h6 mt-1 mb-3 fw-normal">กรุณากรอกข้อมูลเข้าสู่ระบบ</h1>
       
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
       
        <div class="form-floating">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Email</label>
        </div>

        <div class="form-floating">
        <input type="text" name="password" class="form-control" id="floatingInput" placeholder="Password" required>
        <label for="floatingInput">Password</label>
        <br>
        </div>

        <button class="w-100 mb-4 btn btn-lg " style="background-color: #F3B04B" type="submit" name="submit" value="Login" >Login</button>
        <br>
        <button class=" mb-1 btn" style="background-color: #0085FF" onclick="document.location='reg_std.php'" >สมัครสมาชิกสำหรับนักศึกษา</button>
        <br>
        <button class="btn " style="background-color: #E59595" onclick="document.location='reg_admin.php'" >สมัครสมาชิกสำหรับสถานประกอบการ</button>
        <br>

        <p class="mt-5 mb-1 text-muted">© ParttimeRMUTT</p>
    </form>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>