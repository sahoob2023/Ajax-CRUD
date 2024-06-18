<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="search2">
        <label>Seaching Name : </label>
        <input type="text" id="serachbar" autocomplete="off">
    </div>
    <h1>Insert Data</h1>
    <div id="container"> 
    <input type="text" id="fname" placeholder="Enter Name"><br><br>
    <input type="text" id="faddress" placeholder="Enter Address"><br><br>
    <input type="number" id="fage" placeholder="Enter Age"><br><br>
    <input type="number" id="fnum" placeholder="Enter Phoneno"><br><br>
    <input type="submit" class="submit"  id="sub" value="save"><br>
    </div>
    <table>
        <tr>
            <td id="tabledata"></td>
    </table>

    <div id="modal">
        <table cellspacing=1>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        ///load data .
        $(document).ready(function() {
            function loaddata() {
                $.ajax({
                    url: 'showload.php',
                    method: "POST",
                    success: function(data) {
                        $('#tabledata').html(data)
                        
                    }
                });
            }
        
            loaddata();

            ///insert data;
            $('#sub').on('click', function(event) {
                event.preventDefault();
                var fname = $('#fname').val();
                var faddress = $('#faddress').val();
                var fage = $('#fage').val();
                var fnum = $('#fnum').val();
                 
                $.ajax({
                    url: 'showinsert.php',
                    method: 'POST',
                    data: {
                        firstname: fname,
                        Addresss: faddress,
                        Agee: fage,
                        number: fnum
                    },
                    success: function(data) {
                        if (data == 1) {
                            loaddata();
                        } else {
                            alert("Error");
                             
                        }
                    }
                })
            })

            ///delete btn..
            $(document).on('click', '.delete-btn', function(e) {
                var myid = $(this).data('eid');

                // alert(myid);
                $.ajax({

                    url: 'delete1.php',
                    method: 'POST',
                    data: {
                        idd: myid
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(this).closest().fadeOut();
                            loaddata();
                        } else {
                            alert("not delete");
                        }
                    }



                })
            })


            ///edit btn..

            $(document).on('click', '.edit-btn', function(e) {
                var editid = $(this).data('eid');
                // alert(editid);
                $.ajax({
                    url: "edit.php",
                    method: 'POST',
                    data: {eeid:editid},
                    success: function(data) {
                        $('#modal').html(data);

                    }
                })
            })


            ///update btn..
            $(document).on('click', '#updatesub', function() {
                
                var first_id = $('#editid').val();
                var first_name = $('#editname').val();                
                var firstaddress = $('#editaddress').val();
                var firstage = $('#editage').val();
                var firstnum = $('#editnum').val();
                 
                $.ajax({
                    url:"updatedata.php",
                    method:'POST',
                    data:{
                       myidd:first_id,
                       biswa:first_name,
                       bdk:firstaddress,
                       myagee:firstage,
                       mynumm:firstnum
                    },
                    success:function(data){
                         
                        if(data==1){
                            $('#modal').hide();
                            loaddata();
                        } 
                    }
                })
            })

        });//load data close..

            //search data
            $('#serachbar').on('keyup',function(){
                var search1 = $(this).val();

                $.ajax({
                    url: "searchbar.php",
                    method:'POST',
                    data:{ser:search1},
                    success:function(data){
                        $('#tabledata').html(data);
                    }
                })
            })

    </script>
</body>

</html>