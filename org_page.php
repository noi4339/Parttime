<?php 

    session_start();

    if (!$_SESSION['user_id']) {
        header("Location: index.php");
    } else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Page</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reg_std.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">

</head>
<body>

        <h1>You are Student</h1>
        <h3>Hi, <?php echo $_SESSION['user']; ?></h3>
        <p><a href="query/logout.php">Logout</a></p>
    
</body>
</html>


<?php } ?>