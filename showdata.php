<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
<body>
    
    <H1>PHP WITH AJAX </H1>
    <input type="button"  id="btn" value="loadbtn"><br><br>
    <table>
        <tr>
            <td id="tabledata"></td>
</table>


     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#btn').on("click",function(event){
                $.ajax({
                    url : 'showload.php',
                    method : "POST",
                    success : function(data){
                        $('#tabledata').html(data)
                    }
                });
            });
        });
    </script>
    
</body>
</html>