<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users</title>
</head>
<body>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <h1>Post Method</h1>
    <form action="users" method="POST">
        @csrf
        <input type="text" name="userName" placeholder="User Name"/>
        <span style="color: red">@error('userName'){{$message}}@enderror</span><br>
        <input type="password" name="userPassword" placeholder="User password"/>
        <span style="color: red">@error('userPassword'){{$message}}@enderror</span><br>
        <button type="submit">Submit</button>
    </form>

    <h1>Put Method</h1>
    <form action="users" method="POST">
        {{method_field("PUT")}}
        @csrf
        <input type="text" name="userName" placeholder="User Name"/>
        <span style="color: red">@error('userName'){{$message}}@enderror</span><br>
        <input type="password" name="userPassword" placeholder="User password"/>
        <span style="color: red">@error('userPassword'){{$message}}@enderror</span><br>
        <button type="submit">Submit</button>
    </form>

    <h1>Delete Method</h1>
    <form action="users" method="POST">
        {{method_field("DELETE")}}
        @csrf
        <input type="text" name="userName" placeholder="User Name"/>
        <span style="color: red">@error('userName'){{$message}}@enderror</span><br>
        <input type="password" name="userPassword" placeholder="User password"/>
        <span style="color: red">@error('userPassword'){{$message}}@enderror</span><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>