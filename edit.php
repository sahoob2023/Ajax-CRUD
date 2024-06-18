<?php
include 'dbconn.php';

$editt = $_REQUEST['eeid'];

$sql = "select * from biswa where sid = '$editt'";
$result = mysqli_query($conn,$sql);
$table="";

if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        
        $table.= "<h2>Edit table</h2>
        <table border=1  cellpadding='1'>
        <tr>
        <td><input type='text'  id='editid' placeholder='Enter id' hidden value='$row[sid]'>    
        <input type='text'  id='editname' placeholder='Enter name' value='$row[sname]'></td>
    </tr>
    <tr>
        <td><input type='text'  id='editaddress' placeholder='Enter address' value='$row[saddress]'></td>
    </tr>
    <tr>
        <td><input type='number'  id='editage' placeholder='Enter age' value='$row[sage]'></td>
    </tr>
    <tr>
        <td><input type='number'  id='editnum' placeholder='Enter num' value='$row[snum]'></td>
    </tr> </table><br>
    <tr>
        <td><input type='submit' style='background-color: blue;   width: 200px;
        height: 40px; font-size:20px; color:white;' id='updatesub' value='updatebtn'></td> 
    </tr>";
    }
     
    // mysqli_close($conn);
    echo $table;
}else{
    echo "error";
}
?>