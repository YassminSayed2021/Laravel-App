<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form View</title>
</head>
<body>
    <h1>Our First View</h1>
    <form method="post" action="{{ route('receive') }}" >
        @csrf
        <input type="text" name="fname">
        <input type="submit">
    </form>
</body>
</html>