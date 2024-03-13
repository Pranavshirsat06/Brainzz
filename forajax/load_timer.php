<?php
session_start();
if(!isset($_SESSION["endtime"]))
{
    echo "00:00:00";
}
else{
  $time= gmdate("H:i:s",strtotime($_SESSION["endtime"])-strtotime(date("Y-m-d H:i:s")));
  if(strtotime($_SESSION["endtime"])<strtotime(date("Y-m-d H:i:s")))
  {
    echo "00:00:00";
  }
  else{
    echo $time1;
  }
}
?>
