<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>User Name</th>
            <th>Email</th>
        </tr>
        
            @foreach ($users as $user) 
            <tr>
                <td>{{$user->name}}</td>
                <td> {{$user->email}}</td>
                <td><a href="/users/{{$user->id}}/edit">Edit</a></td>
            </tr>
            @endforeach
    </table>
</body>
</html>