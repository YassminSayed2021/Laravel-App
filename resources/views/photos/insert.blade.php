<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photos</title>
</head>
<body>
    <h1>Insert Photo here</h1>
    <form method="POST" action="{{route('photos.store')}}">
        @csrf
        Photo name:<input type="text"><br>
        <input type="submit">
    </form>
</body>
</html>