<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>file upload</title>
</head>
<body>
    <h1>file upload</h1>
    <form action="fileUpload" method="POST">
        @csrf
        <input type="file" name="file" placeholder="Enter User file"/><br/><br/>
        <button type="submit">upload file</button>
    </form>
</body>
</html>