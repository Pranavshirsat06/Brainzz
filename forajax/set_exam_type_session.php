<?php
session_start();
// $exam_time='';
include '../config.php';
$exam_category=$_GET["exam_category"];
$_SESSION["exam_category"]=$exam_category;
$res=mysqli_query($conn,"SELECT * FROM exam_category WHERE category='$exam_category'");
while($row=mysqli_fetch_array($res))
{
    $_SESSION["exam_time"]=$row["examtime"];
}
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";
?>