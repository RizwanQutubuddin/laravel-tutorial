<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razorpay</title>
</head>
<body>
    <h1>Razorpay</h1>
    <form action="{{route('make.order')}}" method="POST">
        @csrf
        <h2>Make payment</h2>
        <input type="text" id="inputPassword" placeholder="amount" name="amount"><br>
        <div>@error('amount'){{$message}}@enderror</div>
        <button type="submit">Make Payment</button>
    </form>
</body>
</html>