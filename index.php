<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3">
            <form  id="frm">
                <div class="form-group">
                    <label>Name :</label>
                    <input class="form-control" type="text" name="name" id="name"  place_holder="Enter Name"/>
                </div>
                <div class="form-group">
                    <label>Age :</label>
                    <input class="form-control" type="number" name="age" id="age"  place_holder="Enter age"/>
                </div>
                <div class="form-group">
                    <label>City :</label>
                    <input class="form-control" type="text" name="city" id="city"  place_holder="Enter city"/>
                </div>
                <div class="form-group">
                    <input  type="hidden" id="id" name="id" value="0" />
                    <input  type="button" class="btn btn-success" id="save" value="Save Details" />
                </div>
            </form>
        </div >
        <div class="col-md-9" id="output">

        </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#output").load("view.php");
            $("#save").click(function(){
                var id=$("#id").val();
                if(id==0){
            // for creation
                    $.ajax({
                    url:"insert.php",
                    type:"post",
                    data:$("#frm").serialize(),
                    
                    success:function(d)
                        {
                            $("<tr></tr>").html(d).appendTo(".table");
                            $("#frm")[0].reset();
                            $("#id").val("0");
                        }
                    });
                }
                    else{
                        //for Update
                    $.ajax({
                    url:"update.php",
                    type:"post",
                    data:$("#frm").serialize(),
                    
                    success:function(d)
                        {
                            $("#output").load("view.php");
                            $("#frm")[0].reset();
                            $("#id").val("0");
                        }
                    });
                    }
                })
            });
            
            //for delete
            $(document).on("click",".del",function(){
                var del =$(this);
                var id=$(this).attr("data-id")
                $.ajax({
                    url:"delete.php",
                    type:"post",
                    data:{id:id},
                    success:function(d)
                    {
                       del.closest("tr").hide();
                    }
                });
            })
            
            //for Update
            $(document).on("click",".edit",function(){
                var row =$(this);
                var id=$(this).attr("data-id")
                $("#id").val(id);
                var name =row.closest("tr").find("td:eq(0)").text();
                $("#name").val(name);
                var age = row.closest("tr").find("td:eq(1)").text();
                $("#age").val(age);
                var city = row.closest("tr").find("td:eq(2)").text();
                $("#city").val(city);
        });
    </script>
</body>
</html>