<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>query builder</title>
</head>
<body>
    <h1>Query Builder</h1>
    <h3>Students List</h3>
    @foreach ($students as $student)
    {{$student->name}} | {{$student->email}}<br/>
    @endforeach
</body>
</html>