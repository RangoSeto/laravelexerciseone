<!DOCTYPE html>
<html>
<head>
    <title>Employees Page</title>
</head>
<body>

    <h1>Welcome to our Site</h1>
    <p>This is Employee Show</p>

    @php 
        echo "<pre>".print_r($data['employeedata'],true)."</pre>";
        echo $data['employeedata']['name']. "<br/>";
        echo $data['employeedata']['email']. "<br/>";
        echo $data['employeedata']['phone']. "<br/>";
    @endphp

    <hr/>
    
</body>
</html>

