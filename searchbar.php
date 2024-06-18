<?php
include 'dbconn.php';
$servalue = $_POST['ser'];

$sql = "select * from biswa where sname like '%{$servalue}%'";
$result = mysqli_query($conn,$sql);
$table="";
if(mysqli_num_rows($result) > 0){
    $table .= '<table border=1 style="border-collapse:collapse;  text-align: center; width: 600px;  
    border: 5px solid black;   " cellspacing=1>
    <tr >
        <td style="padding:10px; font-weight: 900; ">ID</td>
        <td style="padding:10px; font-weight: 900; " >NAME</td>
        <td style="padding:10px; font-weight: 900; ">ADDRESS</td>
        <td style="padding:10px; font-weight: 900; ">AGE</td>
        <td style="padding:10px; font-weight: 900; ">NUMBER</td>
        <td style="padding:10px; font-weight: 900; ">Action</td>
        <td style="padding:10px; font-weight: 900; ">Action</td>

    </tr>';
    while($row = mysqli_fetch_assoc($result)){
        $table.="<tr>
            <td style=padding:10px;>$row[sid]</td>
            <td>$row[sname]</td>
            <td>$row[saddress]</td>
            <td>$row[sage]</td>
            <td>$row[snum]</td>
            <td><button style='background-color: red;' class ='delete-btn' data-eid='$row[sid]'>Delete</button></td>
            <td><button style='background-color: yellow;' class ='edit-btn' data-eid='$row[sid]'>Edit</button></td>

        </tr>";
    }
    $table.='</table>';
    mysqli_close($conn);
    echo $table;
}else{
    
    $color = 'red';
    echo "Not Found the record <style>body {color: $color;
    font-size:15px; }</style>";

}

?>