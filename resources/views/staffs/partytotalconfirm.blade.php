<!DOCTYPE html>
<html>
<head>
    <title>Staff Page</title>
</head>
<body>
    <h1>Welcome to our Site</h1>
    <p>This is Staff Party Total Confirm is {{$total}} are {{$status}}</p>
    <ul>
        <li><a href="{{URL::to('staffs')}}">Home</a></li>
        <li><a href="{{route('staffs.party')}}">Party</a></li>
        <li><a href="">Edit</a></li>
    </ul>
</body>
</html>