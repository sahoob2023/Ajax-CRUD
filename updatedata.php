<?php

include 'dbconn.php';

$id1=$_REQUEST['myidd'];
$name1=$_REQUEST['biswa'];
$address1=$_REQUEST['bdk'];
$age1=$_REQUEST['myagee'];
$num1=$_REQUEST['mynumm'];


$sql="update biswa set sname='$name1',saddress='$address1',sage='$age1',snum='$num1' where sid = '$id1'";

$result=mysqli_query($conn,$sql);
if(isset($result)){
  echo 1;
}else{
    echo 0;
}
?>