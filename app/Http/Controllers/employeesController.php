<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class employeesController extends Controller
{
    public function index(){

        // employeedata ကအဲ့arrထဲကnameလိုဖြစ်သွားတာ
        $data['employeedata'] = [
            'name'=>'Aung Ko Ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];

        // dd($data); //dataထုတ်ကြည့်တဲ့ဟာ echoလိုဟာမျိူး

        return view('employees/index',$data); //viewကိုလှမ်းပို့ရင် arrayနဲ့ပို့ပေးရ
    }

    public function passingdataone(){
        $fullname = "Honey Nway Oo";
        $city = "Mandalay";

        // return view('employees/dataone',['fullname'=>$fullname]);
        return view('employees/dataone',['fullname'=>$fullname,"city"=>$city]); //ဒီတိုင်းဆိုရင်တော့Loopingပတ်စရာမလို
    }

    public function passingdatatwo(){

        $greeting = "Have a nice day";

        $students = [
            "Honey Nway Oo",
            "Mandalay",
            "011111"
        ];

        // dd($students);
        return view('employees/datatwo',['greeting'=>$greeting,'students'=>$students]);
    }

    public function passingdatathree(){

        $greeting = "Have a nice day";

        $students = [
            "Honey Nway Oo",
            "Mandalay",
            "011111"
        ];

        return view('employees/datathree')->with("greeting",$greeting)->with("students",$students);
    }

    public function passingdatafour(){

        $greeting = "Have a nice day";

        $students = [
            "Honey Nway Oo",
            "Mandalay",
            "011111"
        ];

        // return view('employees/datafour',compact("greeting","students")); //recommends
        // return view('employees/datafour')->with(compact("greeting","students")); //recommend
        // return view('employees/datafour',compact("greeting"),compact("students"));
        // return view('employees/datafour',compact("greeting"))->with("students",$students);
        return view('employees/datafour')->with(compact("greeting"))->with(compact("students"));
        // with(with()) ဆိုပြီးတော့၂ခေါက်ထပ်ရေးလို့တော့မရ


    }


    public function show(){
        $data['employeedata'] = [
            'name'=>'Aung Ko Ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];

        return view('employees/show',$data);
    }

    public function edit(){
        $data['employeedata'] = [
            'name'=>'Aung Ko Ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];

        return view('employees/edit',compact('data'));
    }

    public function update(){
        $data['employeedata'] = [
            'name'=>'Aung Ko Ko',
            'email'=>'aungkoko@gmail.com',
            'phone'=>'09123456'
        ];

        return view('employees/update',['employee'=>$data['employeedata']]);
    }



}

// 4CP