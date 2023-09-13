<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<body>
    <H1>Students</H1>
    @foreach ($students as $student)
    {{$student->name}} | {{$student->eml}}<br/>
    @endforeach
    
    {{-- @foreach ($students as $student) {
        echo $student->name."<br>";
    } --}}
</body>
</html>