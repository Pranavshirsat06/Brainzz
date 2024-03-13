<?php
session_start();
include 'header.php';
?>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="images/brainzz_logo.jpeg" class="rounded-circle"alt="">
        <span class="d-none d-lg-block">Brainzz</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div><!-- End Logo -->
    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
        <ul class="breadcome-menu">
          <li>
            <div id="countdowntimer" style="display: block;">
               
            </div>
          </li>
        </ul>
      </div>

      <!-- <script type="text/javascript">
    setInterval(function() {
      timer();
    },1000);
    function timer()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status ==200){
                if(xmlhttp.responseText=="00:00:01") 
                { 
                  alert(xmlhttp.responseText);
                  window.location="result.php";
                }
                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }
        };
      xmlhttp.open("GET","forajax/load_timer.php",true);
      xmlhttp.send(null);
    }
    </script> -->
  </header>
  
  <main id="main" class="main">
   <section class="section dashboard">
    <div class="row">
        <div class="col-lg-6 col-lg-push-3">
            <br>
            <div class="row">
               <br>
               <div class="col-lg-2 col-lg-push-10">
                  <div id="current_que" style="float:left">0</div>
                  <div style="float:left">/</div>
                  <div id="total_que" style="float:left">0</div>
               </div>
                  
                 <div class="row" style="margin-top: 30px">
                    <div class="row">
                       <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color: white" id="load_questions">

                    </div>
                    </div>
                 </div>
                 
                 <div class="row" style="margin-top: 10px;">
                  <div class="col-lg-6 col-lg-push-3" style="min-height: 50px">
                   <div class="col-lg-12 text-center">
                      <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
                      <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
                   </div>

                  </div>

                 </div>

            </div>
            <!-- ending -->
        </div>
    </div>
  </section>
  </main>

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
  
  <script type="text/javascript">
       function load_total_que()
       {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState== 4 && xmlhttp.status ==200){
                document.getElementById("total_que").innerHTML=xmlhttp.responseText; 
            }
        };
        xmlhttp.open("GET","forajax/load_total_que.php",true);
        xmlhttp.send(null);
       }

       var questionno="1";
       load_questions(questionno);
       function load_questions(questionno)
       {
        document.getElementById("current_que").innerHTML=questionno;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status ==200){
                if(xmlhttp.responseText=="over")
                {
                    window.location="ex.php";
                } 
                else{
                   document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                   load_total_que();
                }
            }
        };
        xmlhttp.open("GET","forajax/load_questions.php?questionno="+questionno,true);
        xmlhttp.send(null);
       }

       function radioclick(radiovalue,questionno){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState== 4 && xmlhttp.status ==200){
  
            }
        };
        xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+radiovalue,true);
        xmlhttp.send(null);
       }

       function load_previous()
       {
          if(questionno=="1")
          {
            load_questions(questionno);
          }
          else{
            questionno=eval(questionno)-1;
            load_questions(questionno);
          }
       }

       function load_next()
       {
        questionno=eval(questionno)+1;
        load_questions(questionno);
       }
    </script>
    
    
  </body>
</html>