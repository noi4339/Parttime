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
    <title>Admin Page</title>
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
      <a class="navbar-brand ms-5 mt-2 mt-lg-0" href="admin_page.php">
        <img
          src="img/rmutt-logo.png"
          height="80"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <a class= "ms-4" href="#">
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
    <!-- Notifications -->
    <!-- <a
        class="text-reset me-4  hidden-arrow"
        href="admin_org_list.php"
        id="admin_org_list"
        type="button"
      >
        <i class="fas fa-envelope fa-lg"></i>
        <span class="badge rounded-pill badge-notification bg-danger">1</span>
      </a> -->

      <div class="d-flex align-items-center">

      <!-- Avatar -->
      <a
        class="dropdown-toggle me-4 d-flex align-items-center hidden-arrow"
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

<div class="row p-4">
<div class="col-md-3">
  <div class="btn-group" role="group" aria-label="Basic example">

      <button type="button" class="btn btn-primary">กิจกรรม</button>
      <button type="button" class="btn btn-primary">สถิติ</button>
      <button type="button" class="btn btn-primary" onclick="document.location='admin_org_list.php'">Email ORG.</button>
    </div>
  </div>
  
  <div class="col-md-6"></div>

    <div class="col-md-3">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="md-6 btn btn-success" onclick="document.location='admin_add_job.php'">เพิ่มงาน</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
<h4 class="ms-4">งานทั้งหมด</h4>
<table class=" table align-middle table-hover  table-bordered table-sm table-light">
  <thead class="table-dark text-center">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">งาน</th>
      <th scope="col">วันที่</th>
      <th scope="col">สถานะ</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="col-md-1" >1</th>
      <td>Sit</td>
      <td>Amet</td>
      <td>
        <button type="button" class="btn btn-danger btn-sm px-3">
          <i class="fas fa-times"></i>
        </button>
      </td>
    </tr>
    <tr>
      <th scope="row" >2</th>
      <td>Adipisicing</td>
      <td>Elit</td>
      <td>
        <button type="button" class="btn btn-danger btn-sm px-3">
          <i class="fas fa-times"></i>
        </button>
      </td>
    </tr>
    <tr>
      <th scope="row col-3">3</th>
      <td>Hic</td>
      <td>Fugiat</td>
      <td>
        <button type="button" class="btn btn-danger btn-sm px-3">
          <i class="fas fa-times"></i>
        </button>
      </td>
    </tr>
  </tbody>
</table>
</div>


      <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>


</body>

</html>


<?php } ?>