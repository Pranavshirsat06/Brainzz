<?php
@$examname = $_POST['examname'];
@$examtime = $_POST['examtime'];

//Database connection here
$con = new mysqli("localhost", "root", "", "MINI");
if($con->connect_error){
    die("Failed to connect :".$con->connect_error);
} else {
  $stmt = $con->prepare("insert into exam_category(examname,examtime) values(?,?)");
  $stmt->bind_param("ss", $examname, $examtime);
  $stmt->execute();
  echo "Exam Added succesfully";
  $stmt->close();
  $con->close();
}
?>
