<?php
  include 'config.php';
  $id=$_GET["id"];
  $exam_category='';
  $res=mysqli_query($conn, "SELECT * FROM exam_category WHERE id=$id");
  while($row=mysqli_fetch_array($res))
  {
    $exam_category=$row["category"];
  }
?>
<?php
     if (isset($_POST['submit']))
     {
       $loop=0;
         $count=0;
         $res=mysqli_query($conn, "SELECT * FROM questions where category='$exam_category' ORDER BY id asc") or die(mysqli_error($conn));
         $count=mysqli_num_rows($res);
         if($count==0)
         {

         }
         else{
          while($row=mysqli_fetch_array($res))
          {
             $loop=$loop+1;
             mysqli_query($conn,"UPDATE questions set question_no='$loop' where id=$row[id]");
          }
          }
          $loop=$loop+1;
          mysqli_query($conn, "INSERT INTO questions VALUES(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($conn));

          ?>
            <script type=text/javascript>
             alert("Question Added Successfully");
             window.location.href=window.location.href;
            </script>
          <?php
         }
?>

<?php
     if (isset($_POST['submit2']))
     {
       $loop=0;
         $count=0;
         $res=mysqli_query($conn, "SELECT * FROM questions where category='$exam_category' order by id asc") or die(mysqli_error($conn));
         $count=mysqli_num_rows($res);
         if($count==0)
         {

         }
         else{
          while($row=mysqli_fetch_array($res))
          {
             $loop=$loop+1;
             mysqli_query($conn,"UPDATE questions set question_no='$loop' where id=$row[id]");
          }
          }
          $loop=$loop+1;
          $tm=md5(time());

          $fnm1=$_FILES["fopt1"]["name"];
          $dst1="./opt_images/".$fnm1;
          $dst_db1="opt_images/".$fnm1;
          move_uploaded_file($_FILES["fopt1"]["tmp_name"],$dst1);

          $fnm2=$_FILES["fopt2"]["name"];
          $dst2="./opt_images/".$fnm2;
          $dst_db2="opt_images/".$fnm2;
          move_uploaded_file($_FILES["fopt2"]["tmp_name"],$dst2);

          $fnm3=$_FILES["fopt1"]["name"];
          $dst3="./opt_images/".$fnm3;
          $dst_db3="opt_images/".$fnm3;
          move_uploaded_file($_FILES["fopt3"]["tmp_name"],$dst3);

          $fnm4=$_FILES["fopt4"]["name"];
          $dst4="./opt_images/".$fnm4;
          $dst_db4="opt_images/".$fnm4;
          move_uploaded_file($_FILES["fopt4"]["tmp_name"],$dst4);

          $fnm5=$_FILES["fanswer"]["name"];
          $dst5="./opt_images/".$fnm5;
          $dst_db5="opt_images/".$fnm5;
          move_uploaded_file($_FILES["fanswer"]["tmp_name"],$dst5);

          mysqli_query($conn, "INSERT INTO questions VALUES(NULL,'$loop','$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5','$exam_category')") or die(mysqli_error($conn));

          ?>
            <script type=text/javascript>
             alert("Question Added Successfully");
             window.location.href=window.location.href;
            </script>
          <?php
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

    <!-- End Search Bar -->

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

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <!-- End Register Page Nav -->
      <!-- End Login Page Nav -->

      <!-- End Error 404 Page Nav -->

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
      <h1>Add Exam Questions inside <?php echo $exam_category; ?></h1>
      <nav>
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item active">Select Exam Category to Add and Edit Exam</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">
    <div class="col-lg-6">
      <div class="card">
        
        <div class="card">
          <div class="card-body">
           <form action="" method="post" enctype="multipart/form-data" >
             <h5 class="card-title">Add New Questions with text</h5>
             <!-- <form action="" method="post" enctype="multipart/form-data" > -->
             <!-- Vertical Form -->
             <form class="row g-3">
              <div class="col-12">
                <label for="inputNanme4" class="name">Add Question</label>
                <input type="text" class="form-control" autocomplete="off" name="question"  placeholder="Add Question" required>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add option 1</label>
                <input type="text" class="form-control" autocomplete="off" name="opt1"  placeholder="Add option 1"required>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add option 2</label>
                <input type="text" class="form-control" autocomplete="off" name="opt2"  placeholder="Add option 2"required>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add option 3</label>
                <input type="text" class="form-control" autocomplete="off" name="opt3"  placeholder="Add option 3"required>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add option 4</label>
                <input type="text" class="form-control" autocomplete="off" name="opt4"  placeholder="Add option 4"required>
              </div>
              <br>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add answer</label>
                <input type="text" class="form-control" autocomplete="off" name="answer"  placeholder="Add answer"required>
              </div>
              <br>
              <div class="text-center">
                <input type="submit" class="btn btn-primary w-100" value="submit" name="submit"> 
               </div>
             </form><!-- Vertical Form --> 
           
              </div>
             </div>
             </div>
              </div>
     
             <div class="col-lg-6">
              <div class="card">
              <div class="card">
               <div class="card-body">
             <h5 class="card-title">Add New Questions with Images</h5>
          
             <!-- Vertical Form -->
             <form class="row g-3">
              <div class="col-12">
                <label for="inputNanme4" class="name">Add Question</label>
                <input type="text" class="form-control" name="fquestion"  placeholder="Add Question"required>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add option 1</label>
                <input type="file" class="form-control" name="fopt1">
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add option 2</label>
                <input type="file" class="form-control" name="fopt2">
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add option 3</label>
                <input type="file" class="form-control" name="fopt3">
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add option 4</label>
                <input type="file" class="form-control" name="fopt4">
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="name">Add answer</label>
                <input type="file" class="form-control" name="fanswer">
              </div>
              <br>
              <div class="text-center">
                <input type="submit" class="btn btn-primary w-100" value="submit" name="submit2"> 
               </div>
             </form>
           </div>
        </div>
      </div>
    </div>
  </form>
   </div>
  </section>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
          <div class="card-body">
          <h5 class="card-title">Questions</h5>
            <table class="table table-bordered">
              <tr>
                <th>No</th>
                <th>Questions</th>
                <th>Opt1</th>
                <th>Opt2</th>
                <th>Opt3</th>
                <th>Opt4</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            
            <?php
            $res=mysqli_query($conn,"SELECT * FROM questions WHERE category='$exam_category' ORDER BY question_no asc ");
            while($row=mysqli_fetch_array($res))
            {
              echo "<tr>";
              echo "<td>"; echo $row["question_no"];  echo "</td>";
              echo "<td>"; echo $row["question"];  echo "</td>";
              echo "<td>"; 
                if(strpos($row["opt1"],"opt_images/")!==false)
                {
                  ?>
                   <img src="<?php echo $row["opt1"];?>" height="50" width="50">
                  <?php
                }
                else{
                  echo $row["opt1"];
                }
              echo "</td>";
              echo "<td>"; 
                if(strpos($row["opt2"],"opt_images/")!==false)
                {
                  ?>
                   <img src="<?php echo $row["opt2"];?>" height="50" width="50">
                  <?php
                }
                else{
                  echo $row["opt2"];
                }
              echo "</td>";
              echo "<td>"; 
                if(strpos($row["opt3"],"opt_images/")!==false)
                {
                  ?>
                   <img src="<?php echo $row["opt3"];?>" height="50" width="50">
                  <?php
                }
                else{
                  echo $row["opt3"];
                }
              echo "</td>";
              echo "<td>"; 
                if(strpos($row["opt4"],"opt_images/")!==false)
                {
                  ?>
                   <img src="<?php echo $row["opt4"];?>" height="50" width="50">
                  <?php
                }
                else{
                  echo $row["opt4"];
                }
              echo "</td>";
              echo "<td>";
              if(strpos($row["opt4"],"opt_images/")!==false)
              {
                ?>
                 <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>">Edit</a>
                <?php
              }
              else{
                ?>
                 <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id;?>">Edit</a>
                <?php
              }
              echo "</td>";
                  
              echo "<td>";
              ?>
               <a href="Delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id;?>">Delete</a>
              <?php
              echo "</td>";
              echo "</tr>";
            }
            ?>
            </table>
          </div>
      </div>
    </div>
  </div>

  </main><!-- End #main -->



 <!-- #region -->
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

