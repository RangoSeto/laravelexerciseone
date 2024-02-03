<!DOCTYPE html>
<html>
<head>
    <title>About Page</title>
</head>
<body>
    <h1>Welcome to our page</h1>
    <p>This is About Page</p>
    <ul>
        <li><a href="{{URL::to('/')}}">Home</a></li>
        <li><a href="{{URL::to('/about/')}}">About</a></li>
        <li><a href="{{URL::to('/sayar')}}">Sayar</a></li>
        <li><a href="{{route('profiles')}}">Profile</a></li>
    </ul>
</body>
</html>