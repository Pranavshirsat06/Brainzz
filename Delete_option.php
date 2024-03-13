<?php
include 'config.php';
$id=$_GET["id"];
$id1=$_GET["id1"];
mysqli_query($conn,"DELETE FROM questions WHERE id=$id");
?>
<script type="text/javascript">
        window.location="addquestion1.php?id=<?php echo $id1 ?>";
      </script>