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