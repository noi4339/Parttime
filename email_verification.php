<?php 

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email verification</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/signin.css", rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400&display=swap" rel="stylesheet">
    
    <script type='text/javascript'>
    setTimeout(function() {
        document.getElementById('resend').disabled = false;
    }, 10000);
    </script>
    
</head>
<body class="text-center">
<div class="container">
    <main>
    <img class="mb-1 mt-4" src="img/rmutt-logo.png"  width="80px">

    <h1 > ระบบจัดหางานนอกเวลาสำหรับนักศึกษา </h1>
    <h2 > มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี </h2>
    <br>
<form action="query/email_verification_db.php" method="POST" width = "60px" class=" btn "  style="background-color: #B8D1E4">
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="w-100 success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['email'])) : ?>
            <?php 
                $_GET['email'] = $_SESSION['email'];
            ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])) : ?>
        <div class="w-100 error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
        <?php endif; ?>
    <input class= "mb-2 btn btn-lg disabled" type="text" name="email" value="<?php echo $_GET['email']; ?>" required>
    <h5 for="floatingInput">กรุณายืนยันอีเมล</h5>
    <div class="form-floating">
      <input type="text" name="verification_code" class="form-control" placeholder="Enter verification code" />
      <label for="floatingInput">Verification code</label>
    </div>
    <br>

      <input class="mb-4 btn btn-success" type="submit" name="verify_email" value="Verify Email">
      <br>
      <h6>ขอรหัสยืนยันอีกครั้งกด
      <input class="btn btn-link btn-sm" id="resend" disabled="disabled" type="submit" name="resend" value="Resend"></h6>


</form>
</main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
      unset($_SESSION['error']);
      unset($_SESSION['success']);
    }

?>
