<?php
    include 'config.php';
    $msg = "";
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
        $code = mysqli_real_escape_string($conn, md5(rand()));
        
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO users (name, email, password, code) VALUES ('{$name}', '{$email}', '{$password}', '{$code}')";
                $result = mysqli_query($conn, $sql);
                $msg = "<div class='alert alert-info'>Registration Succsessfull!!!</div>";
            
                
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";  
            }
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
   <!--/Style-CSS -->
   <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <script src="js/valid.js"></script>
</head>
<body>      
<div class="section">
 <div class="container">
     <div class="row full-height justify-content-center">
         <div class="col-12 text-center align-self-center py-5">
             <div class="section pb-5 pt-5 pt-sm-2 text-center">
                 <h3 class="mb-0 pb-3"><span>Sign Up</span></h3>
                   <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                   <!-- <label for="reg-log"></label> -->
                   <!-- <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <style></style>
                            <img src="images/image2.svg" alt="">
                        </div>
                    </div> -->
                 <div class="card-3d-wrap mx-auto">
                       <div class="card-3d-wrapper">
                            <div class="card-back">
                              <?php echo $msg; ?>
                              <form action="" method="post">
                             <div class="center-wrap">
                                 <div class="section text-center">
                                     <!-- <h6 class="mb-4 mt-4 text-center" >sign up</h6> -->
                                     <div class="form-group">
                                         <input type="text" name="name" class="form-style" placeholder="Your Full Name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required autocomplete="off">
                                         <i class="input-icon uil uil-user"></i>
                                     </div>	
                                     <div class="form-group mt-2">
                                         <input type="email" name="email" class="form-style" placeholder="Your Email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" autocomplete="off" required>
                                         <i class="input-icon uil uil-at"></i>
                                     </div>	
                                     <div class="form-group mt-2">
                                         <input type="password" name="password" class="form-style" placeholder="Enter Your Password" id="pass" required>
                                         <span id="password" class="text-danger font-weight-bold"></span>
                                         <i class="input-icon uil uil-lock-alt"></i>
                                     </div>
                                     <div class="form-group mt-2">
                                         <input type="password" class="form-style" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                                         <i class="input-icon uil uil-lock-alt"></i>
                                     </div>
                                     <button onclick="return validatelogin();" name="submit" class="btn mt-4" type="submit" Register ></button>
                                   </div>
                                   <p class="mb-8 mt-4 text-center"><a href="login1.php" class="link"><h6>Have an account?Login</h6></a></p>
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
<div>
    <p id="length"></p>
</div>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
crossorigin="anonymous"></script>


<script type="text/javascript" src="script.js"></script>

<script src="jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
    <script type="text/javascript">
        
        function validate(){
            var pass = document.getElementById('pass').value;
            const passpattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if(((pass.length <=5) || (pass.length >20)) || (!pass.value.match(passpattern))){
                document.getElementById('password').innerHTML = "Password length must be between 5 and 20";
                return false;
            }
            // if(!pass.value.match(passpattern)){
            //     document.getElementById('password').innerHTML = "Please enter atleast 8 character with number,symbol,small and capital letter";
            //     return false;
            // }
        }
    </script>
</body>
</html>