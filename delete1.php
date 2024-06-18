<?php

include 'dbconn.php';
$id=$_POST['idd'];


$sql="delete from biswa where sid='$id'";

$result=mysqli_query($conn,$sql);
if(isset($result)){
  echo 1;
}else{
    echo 0;
}
?>