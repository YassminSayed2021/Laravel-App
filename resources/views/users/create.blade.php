<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
</head>
<body>
    <form method="post" action="{{route('users.store')}}">
        @csrf
        <label for="name">User Name</label>
            <input type="text" name="name"><br><br>
        <label for="email">User Email:</label>
        <input type="email" name="email"><br><br>
        <label for="password">Password</label>
        <input type="password" name="password"><br/>
        <input type="submit" value="Add">
    </form>
</body>
</html>