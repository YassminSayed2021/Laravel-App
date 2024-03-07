<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.min.js')}}" ></script>
    <title>Show Customer Details</title>
</head>
<body>
    <h1>
        Welcome {{$customer->Customer_name}}</h1>
        <h2>
            Your Email:{{$customer->Email}}</h2>
</body>
</html>