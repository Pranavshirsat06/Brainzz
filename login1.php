<?php
    include 'config.php';
    $msg = "";
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            header("Location: index3.php");
        } else {
            $msg ="<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <!--login button css-->
<link rel="stylesheet" href="style.css">

</head>

<body>  
<!--login button start-->

<div class="section">
 <div class="container">
     <div class="row full-height justify-content-center">
         <div class="col-12 text-center align-self-center py-5">
             <div class="section pb-5 pt-5 pt-sm-2 text-center">
             
                   
                   <!-- <label for="reg-log"></label> -->
                 <div class="card-3d-wrap mx-auto">
                     <div class="card-3d-wrapper">
                         <div class="card-front">
                             <?php echo $msg; ?>
                              <form action="" method="post">
                             <div class="center-wrap">
                                 <div class="section text-center">
                                     <h2 class="mb-4 pb-3">Log In</h2>
                                     <div class="form-group">
                                         <input type="email" name="email" class="form-style"  placeholder="Enter Your Email" required>
                                         <i class="input-icon uil uil-at"></i>
                                     </div>	
                                     <div class="form-group mt-2">
                                         <input type="password" name="password" class="form-style"  placeholder="Enter Your Password" id="pass" required>
                                         <i class="input-icon uil uil-lock-alt"></i>
                                     </div>
                                     <button name="submit" name="submit" class="btn mt-4" type="submit">Login </button>
                                     <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
                                   </div>
                               </div>
                              </form>
                             </div>
                         
                       </div>
                   </div>
               </div>
           </div>
       </div>
 </div>
</div>

<!--login button ends-->

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
crossorigin="anonymous"></script>

<!-- swiper js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>

<script type="text/javascript" src="script.js"></script>

<script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
</body>
</html>