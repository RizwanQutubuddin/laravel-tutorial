<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-header data="User Component page"/>
    <h1>User page</h1>
    @if ($user=="Rizwan")
    <p>if Hello : {{$user}}</p>
    @else
    <p>else Hello : {{$user}}</p>
    @endif
    <script>
        let user=@json($user);
        console.log(user);
    </script>
</body>
</html>