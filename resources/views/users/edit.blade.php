<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Customer</title>
</head>
<body>
    <form method="post" action="{{route('users.update',[$user->id]) }}">
        @csrf
        @method('put')
        <label for="name">User Name</label>
            <input type="text" name="name" value="{{$user->name}}"><br><br>
        <label for="email">Customer Email:</label>
        <input type="email" name="email" value="{{$user->email}}"><br><br>
        <label for="password">Password</label>
        <input type="password" name="password" value="{{$user->password}}"><br/>
        <input type="submit" value="Update">
    </form>
</body>
</html>