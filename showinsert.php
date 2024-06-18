<?php
include 'dbconn.php';
$f_name=$_POST['firstname'];
$f_address=$_POST['Addresss'];
$f_age=$_POST['Agee'];
$f_phone=$_POST['number'];

$sql="insert into biswa(sname,snum,saddress,sage)values('$f_name','$f_phone','$f_address','$f_age')";

$result=mysqli_query($conn,$sql);
if(isset($result)){
    echo 1;
}
else{
    echo 0;
}
?>