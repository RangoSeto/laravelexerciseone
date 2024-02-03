<!DOCTYPE html>
<html>
<head>
    <title>Employees Page</title>
</head>
<body>

    <h1>Welcome to our Site</h1>
    <p>This is Employee Show</p>

    @php 
        echo "<pre>".print_r($employee,true)."</pre>";
        echo $employee['name']. "<br/>";
        echo $employee['email']. "<br/>";
        echo $employee['phone']. "<br/>";
    @endphp

    <ul>
        @foreach($employee as $value)
            <!-- <li>{{$value}}</li> -->
            <li>{!!$value!!}</li>
        @endforeach
    </ul>
    
</body>
</html>

