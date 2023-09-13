<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>flash session</title>
</head>
    <body>
        <h1>Flash session</h1>

        @if(session('user'))
            <h3>{{session('user')}}</h3>
        @endif

        @if(session('email'))
            <h3>{{session('email')}}</h3>
        @endif

        @if(session('password'))
            <h3>{{session('password')}}</h3>
        @endif

        <form action="flashsession" method="POST">
            @csrf
            <input type="text" name="user" placeholder="Enter User Name" value="{{session('user')}}" /><br/><br/>
            <input type="email" name="email" placeholder="Enter User Email"  value="{{session('email')}}" /><br/><br/>
            <input type="password" name="password" placeholder="Enter User Password"  value="{{session('password')}}" /><br/><br/>
            <button>Add Member</button>
        </form>
    </body>
</html>