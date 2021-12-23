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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/admin_add_job.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400&display=swap" rel="stylesheet">


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
      <a class="navbar-brand ms-4 mt-2 mt-lg-0" href="admin_page.php">
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
          <a class="nav-link " href="admin_page.php">หน้าหลัก</a>
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
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

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


<div class="container">
    <form action="query/reg_std_db.php" method="post" class="form" class="form-control">
        <h1 class="h3 mt-1 mb-3 text-center fw-normal">กรอกรายละเอียดงาน</h1>

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

          <button type="button" class="btn btn-primary btn-rounded me-2">เพิ่มสถานประกอบการ</button>

            <div class="col-12 ">
              <label for="job_name" class="form-label" >ชื่องาน</label>
              <input type="text" class="form-control" name="job_name" placeholder="" required>          
            </div>
            <div class="col-sm-6">
              <label for="s_datetime" class="form-label" >วันที่เริ่มงาน</label>
              <input type="date" class="form-control" name="s_datetime" required>
            </div>

            <div class="col-sm-6">
              <label for="l_datetime" class="form-label" >วันที่สิ้นสุดงาน</label>
              <input type="date" class="form-control" name="l_datetime" required>
            </div>

            <div class="col-12">
              <label for="f_name" class="form-label" >สถานที่ทำงาน</label>
              <input type="text" class="form-control" name="f_name"  required>
            </div>

            <div class="col-12">
              <label for="l_name" class="form-label">รายละเอียดงาน</label>
              <div class="form-outline mb-4">
                <textarea class="form-control" id="form6Example7" rows="6"></textarea>
              </div> 
            </div>

            <div class="col-sm-8">
              <label for="std_id" class="form-label ">รูปงาน</label>
              <input type="file" class="form-control" id="customFile" />
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8">
              <label for="tel" class="form-label">อัพโหลดเอกสาร</label>
              <input type="file" class="form-control" id="customFile" />
            </div>

            <h6>เงื่อนไขนักศึกษา</h6>
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
        <a class="d-grid gap-2 col-3 mx-auto btn btn-danger" href="admin_page.php">Cancel</a>  
    </form>
    </div>


      <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    

</body>
</html>


<?php } ?>