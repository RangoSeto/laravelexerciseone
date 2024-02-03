<!DOCTYPE html>
<html>
<head>
    <title>Employees Page</title>
</head>
<body>
    <h1>Welcome to our Site</h1>
    <p>This is Employee Index</p>

    <?php
        // foreach($employeedata as $value){
        //     echo $value;
        // }
    ?>

    <!-- @php 
        foreach($employeedata as $value){
            echo $value;
        }
    @endphp -->
    <!-- bladeမှာဒီလိုပုံစံနဲ့ရေးလို့ရ @ -->

    <ul>
        @foreach($employeedata as $value) <!-- ဒီ၁ကြောင်းကပဲphp code ကြားထဲကဟာတွေနဲ့မဆိုင်ဘူး -->
            <!-- <li>{{$value}}</li> -->
            <li>{!!$value!!}</li>
        @endforeach  <!--ဒီ၁ကြောင်းကပဲphp code -->
    </ul>
    

    @php
        $city = "Mandalay";
    @endphp

    @php
        echo $city;
    @endphp


    @if($city === "Yangon")
        <h3>You Correct</h3>
    @else
        <h3>You were wrong</h3>
    @endif


    {{$services}}

    
</body>
</html>

