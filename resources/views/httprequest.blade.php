<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Http Controller</title>
</head>
<body>
    <h1>Http Controller</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $collection as $user)
                <tr>
                    <td>{{$user["id"]}}</td>
                    <td>{{$user["first_name"]}}</td>
                    <td>{{$user["email"]}}</td>
                    <td><img src="{{$user["avatar"]}}"/></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>