<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
</head>
<body>
    <h1>Welcome to our Site</h1>
    <p>This is Profile Page</p>
    <ul>
        <li><a href="{{URL::to('/')}}">Home</a></li>
        <li><a href="{{URL::to('/about/')}}">About</a></li>
        <li><a href="{{URL::to('/sayar')}}">Sayar</a></li>
        <li><a href="{{route('profiles')}}">Profile</a></li> <!-- namingပေးထားတဲ့routeကိုပြန်ခေါ်တဲ့နည်း -->
    </ul>
</body>
</html>