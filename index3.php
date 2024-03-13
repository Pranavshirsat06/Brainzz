<?php
    include 'config.php';
    $msg = "";
if (isset($_POST['submit'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $examtime = mysqli_real_escape_string($conn, $_POST['examtime']);

     if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM exam_category WHERE category='{$category}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$category} - Exam is already exists.</div>";
        } else {
            $sql = "INSERT INTO exam_category (category, examtime) VALUES ('{$category}', '{$examtime}')";
            $result = mysqli_query($conn, $sql);
            $msg = "<div class='alert alert-info'>Exam Added Succsessfully!!!</div>";
            
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style3.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index3.php" class="logo d-flex align-items-center">
        <img src="images/brainzz_logo.jpeg" class="rounded-circle"alt="">
        <span class="d-none d-lg-block">Brainzz</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            
          </a><!-- End Notification Icon -->

          <!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            
          </a><!-- End Messages Icon -->

          <!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="images/user.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
            </li>
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index3.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- End Components Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="home3.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li> -->
      <!-- End Profile Page Nav -->

      <!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="addquestion.php">
          <i class="bi-question-circle"></i>
          <span>Add Exam Question</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <!-- End Register Page Nav -->
      <!-- End Login Page Nav -->

      <!-- End Error 404 Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="old_exam_result.php">
          <i class="bi-question-circle"></i>
          <span>Result</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Log out</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
    
      <div class="col-lg-6">
        <div class="card">
          
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Exam</h5>
        <?php echo $msg; ?>
            <form action="" method="post">
              <!-- Vertical Form -->
              <form class="row g-3">
                <div class="col-12">
                  <label for="inputNanme4" class="name">New Exam Category</label>
                  <input type="text" class="form-control" name="category"  placeholder="New Exam Category" value="<?php if (isset($_POST['submit'])) { echo $category; } ?>" required>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="name">Exam time in Minutes</label>
                  <input type="text" class="form-control" name="examtime"  placeholder="Exam time in Minutes" value="<?php if (isset($_POST['submit'])) { echo $examtime; } ?>" required>
                </div>
                
                <div class="text-center">
                  <input type="submit" class="btn btn-primary w-100" value="submit" name="submit" style="margin-top:15px;"> 
                 </div>
              </form><!-- Vertical Form --> 
            </form>  
            </div>
          </div>
        </form>
        </div>
      </div>
    
      
      <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Exam Categories</h5>
          
          <!-- Primary Color Bordered Table -->
          <table class="table table-bordered border-primary">

            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Exam Name</th>
                <th scope="col">Exam Time </th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
             $count=0;
             $res=mysqli_query($conn, "select * from exam_category");
             while ($row=mysqli_fetch_array($res))
             {
              $count=$count+1;
              ?>
               <tr>
                    <th scope="row"><?php echo $count; ?></th>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["examtime"]; ?></td>
                    <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                </tr>
              <?php
             }
            ?>

            </tbody>
          </table>
          <!-- End Primary Color Bordered Table -->

        </div>
      </div>
    </div> 
      
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Brainzz</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendor/apexcharts/apexcharts.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/chart.js/chart.umd.js"></script>
  <script src="vendor/echarts/echarts.min.js"></script>
  <script src="vendor/quill/quill.min.js"></script>
  <script src="vendor/simple-datatables/simple-datatables.js"></script>
  <script src="vendor/tinymce/tinymce.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main2.js"></script>

</body>

</html>

