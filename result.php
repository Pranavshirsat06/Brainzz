<?php
  session_start();
  include 'config.php';
  $date=date("Y-m-d H:i:s");
    $_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes") );
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
      
    </div><!-- End Logo -->

    <!-- End Search Bar -->

    <!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <!-- End Sidebar-->
  <main id="main" class="main">
<section class="section dashboard">
  <div class="col-lg-8">
  <div class="card">
  <?php
    $correct=0;
    $wrong=0;

  if(isset($_SESSION["answer"]))
   {
    for($i=1;$i<=sizeof($_SESSION["answer"]);$i++)
    {
        $answer="";
        $res=mysqli_query($conn,"SELECT * FROM questions WHERE category='$_SESSION[exam_category]' && question_no=$i");
        while($row=mysqli_fetch_array($res))
        {
            $answer=$row["answer"];
        }
        if(isset($_SESSION["answer"][$i]))
        {
            if($answer==$_SESSION["answer"][$i])
            {
                $correct=$correct+1;

            }
            else{
                $wrong=$wrong+1;
            }
        }
        else{
            $wrong=$wrong+1;
        }
    }
 }
    $count=0;
    $res=mysqli_query($conn,"SELECT * FROM questions WHERE category='$_SESSION[exam_category]'") ;
    $count=mysqli_num_rows($res);
    $wrong=$count-$correct;
    echo "<br>";echo "<br>";
    echo "<center>";
    echo "Total Questions=".$count;
    echo "<br>";
    echo "Correct Answer=".$correct;
    echo "<br>";
    echo "Wrong Answer=".$wrong;
    echo "</center>";
?>
  </div>
 </div> 
</section>
</main>
<?php
if(isset($_SESSION["exam_start"]))
{
    $date=date("Y-m-d");
    //ithe mysql chi insert wali query taakh table chya hishobane
    mysqli_query($conn,"INSERT INTO exam_results(id,exam_type,total_question,correct_answer,wrong_answer,exam_time)VALUES(NULL,'$_SESSION[exam_category]','$count','$correct','$wrong','$date') ") or die(mysqli_error($conn));
}
if(isset($_SESSION["exam_start"])){
    unset($_SESSION["exam_start"]);
    ?>
    <script type ="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}
?>
  <!-- End #main -->
  
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

