<?php
include('conn.php');
$id=$_GET['id'];
$query="DELETE FROM record WHERE id = '$id'";
$result=mysqli_query($conn,$query);
if($result){
    echo "<script>
    alert('Record Deleted successfully');
    window.location.href = 'display.php';
  </script>";
}
else{
   echo "<script> alert('Record Not Found');</script>";
}
?>