<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajax-view</title>
</head>
<body>
    <h1>AJAX CRUD</h1>
    <h2 id="result"></h2>
    <form id="addStudent">
        @csrf
        <input type="hidden" id="id" name="id"><br>
        <input type="text" id="name" name="name" placeholder="enter name"><br>
        <input type="text" id="email" name="email" placeholder="enter email"><br>
        <input type="text" id="age" name="age" placeholder="enter age"><br>
        <input type="text" id="city" name="city" placeholder="enter city"><br>
        <button type="submit">Submit</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>city</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableData">
            
        </tbody>
    </table>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        fnGetData();
        function fnGetData(){

            $.ajax({
                url:'/ajax-getdata',
                type:'GET',
                success:function(response){
                    let tableData="";
                    response.data.forEach(element => {
                        tableData+="<tr><td>"+element.id+"</td><td>"+element.name+"</td><td>"+element.email+"</td><td>"+element.city+"</td><td><input type='button' value='Edit' id='edit"+element.id+"' class='btn' onclick=fnGetId("+element.id+")> | <input type='button' value='Delete' id='delete"+element.id+"' class='btn' onclick=fnDelete("+element.id+")></td></tr>";
                    });
                    $("#tableData").html(tableData);
                }
            })
        }
        
        function fnDelete(id){
            if(confirm("Sure..! You want to delete it?")){
                let _token=$("input[name=_token]").val();
                $.ajax({
                    url:'/ajax-deletedata/'+id,
                    type:'DELETE',
                    data:{
                        _token:_token
                    },
                    success:function(response){
                        document.getElementById("result").innerHTML=response.result;
                        fnGetData();
                    }
                })
            }
        }
        function fnGetId(id){

            $.ajax({
                url:'/ajax-getdata/'+id,
                type:'GET',
                success:function(response){
                    document.getElementById("id").value=response.data.id
                    document.getElementById("name").value=response.data.name
                    document.getElementById("email").value=response.data.email
                    document.getElementById("age").value=response.data.age
                    document.getElementById("city").value=response.data.city
                }
            })
            
        }

        $("#addStudent").submit(function(e){
            e.preventDefault();

            let id=$("#id").val();
            let name=$("#name").val();
            let email=$("#email").val();
            let age=$("#age").val();
            let city=$("#city").val();
            let _token=$("input[name=_token]").val();

            if(id!=""){
                $.ajax({
                    url:'/ajax-updatedata/'+id,
                    type:'PUT',
                    data:{
                        name:name,
                        email:email,
                        age:age,
                        city:city,
                        _token:_token
                    },
                    success:function(response){
                        document.getElementById("result").innerHTML=response.result;
                        document.getElementById("addStudent").reset();
                        fnGetData();
                    }
                })
            }else{
                $.ajax({
                    url:'/ajax-adddata',
                    type:'POST',
                    data:{
                        name:name,
                        email:email,
                        age:age,
                        city:city,
                        _token:_token
                    },
                    success:function(response){
                        document.getElementById("result").innerHTML=response.result;
                        document.getElementById("addStudent").reset();
                        fnGetData();
                    }
                })
            }
        });

    </script>
</body>
</html>