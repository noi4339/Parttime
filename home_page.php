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
    <title>Home Page</title>
<!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/admin_page.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400&display=swap" rel="stylesheet">
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>


</head>
<body>
      <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand ms-5 mt-2 mt-lg-0" href="#">
        <img
          src="img/rmutt-logo.png"
          height="80"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <a class= "ms-4" href="home_page.php">
        <h4>ระบบจัดหางานนอกเวลาสำหรับนักศึกษา</h4>
        <h4>มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</h4>
        </a>
      <!-- Left links -->
      <ul class="navbar-nav   me-auto ms-5 mb-5 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="#">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">หางาน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">เอกสาร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_me.php">เกี่ยวกับเรา</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">

      <!-- Avatar -->
      <a
        class="dropdown-toggle me-5 d-flex align-items-center hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
      <h5><?php echo $_SESSION['user']; ?></h5>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end "
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="#">My profile</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Settings</a>
        </li>
        <li>
          <a class="dropdown-item" href="query/logout.php">Logout</a>
        </li>
        </a>
      </ul>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->



      <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>


</body>

</html>


<?php } ?>