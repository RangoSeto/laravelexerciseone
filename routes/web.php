<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\staffsController;
use App\Http\Controllers\dashboardsController;
use App\Http\Controllers\membersController;
use App\Http\Controllers\ProductsController;

use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Gender;
use App\Models\Item;
use App\Models\Phone;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use App\Models\Tag;

use Carbon\Carbon;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/",function(){
	return "Save Myanmar";
}); 

Route::get("/sayar",function(){
	return "Hay,Sayar Nay Kaung Lar??";
}); 

Route::get("sayhi",function(){
	return "Hi Min Ga Lar Par";
});

// Route::get("about",function(){
// 	return view("aboutme");
// });

// (or)

Route::view("about","aboutme");

// Route::get("about/company",function(){
//     return view('aboutcompany');
// });

Route::view('about/company','aboutcompany');

// Route::get('contact',function(){
// 	return redirect('about');
// });

// Route::redirect('contact','about');

Route::redirect('contact','about/company');


Route::get('about/company/{staff}',function($staff){
	return view('aboutcompanystaff',['sf'=>$staff]);
});

Route::get('about/company/{staff}/{city}',function($staff,$city){
	return view('aboutcompanystaffbycity',['sf'=>$staff,'ct'=>$city]);
});


Route::get('profile',function(){
	return view('profileme');
});

Route::get('profile',function(){
	return view('profileme');
})->name('profiles');



// ရှေ့ကဟာတွေက  routeကနေviewကိုတိုက်ရိုက်လုပ်တာ ဒါကကြားထဲကcontrollerကလုပ်ပေးတာ

// Route::get('/students',[\App\Http\Controllers\studentsController::class,'index'])->name('students.index');
// Route::get('/students/show',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
// Route::get('/students/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');


// => Route Group
// Route::group(['prefix'=>'students'],function(){
// 	Route::get('/',[\App\Http\Controllers\studentsController::class,'index'])->name('students.index');
// 	Route::get('/show',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
// 	Route::get('/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');
// });



// Route::name('students.')->group(function(){
// 	Route::get('/students',[\App\Http\Controllers\studentsController::class,'index'])->name('index');
// 	Route::get('/students/show',[\App\Http\Controllers\studentsController::class,'show'])->name('show');
// 	Route::get('/students/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('edit');
// });

Route::name('students.')->group(function(){
	Route::get('/students',[studentsController::class,'index'])->name('index');
	Route::get('/students/show',[studentsController::class,'show'])->name('show');
	Route::get('/students/edit',[studentsController::class,'edit'])->name('edit');
});




Route::get('/staffs',[staffsController::class,'home'])->name('staffs.home');
Route::get('/staffsparty',[staffsController::class,'party'])->name('staffs.party');
Route::get('/staffsparty/{total}',[staffsController::class,'partytotal'])->name('staffs.total');
Route::get('/staffsparty/{total}/{status}',[staffsController::class,'partytotalconfirm'])->name('staffs.status');


Route::get('employees',[employeesController::class,'index'])->name('employees.index');
Route::get('employees/show',[employeesController::class,'show'])->name('employees.show');
Route::get('/employees/passingdataone',[employeesController::class,'passingdataone'])->name('employees.passingdataone');
Route::get('/employees/passingdatatwo',[employeesController::class,'passingdatatwo'])->name('employees.passingdatatwo');
Route::get('/employees/passingdatathree',[employeesController::class,'passingdatathree'])->name('employees.passingdatathree');
Route::get('/employees/passingdatafour',[employeesController::class,'passingdatafour'])->name('employees.passingdatafour');
Route::get('employees/edit',[employeesController::class,'edit'])->name('employees.edit');
Route::get('employees/update',[employeesController::class,'update'])->name('employees.update');


// =>yield 

Route::get('/dashboards',[dashboardsController::class,'index'])->name('dashboards.index');
Route::get('/layouts',[membersController::class,'index'])->name('layouts.index');
Route::get('/members',[membersController::class,'index'])->name('members.index');



// =>Data Insert From route

// use Illuminate\Support\Facades\DB;
Route::get('types/insert',function(){
	DB::insert("INSERT INTO types(name) value(?)",["pdf"]);
	return "Successfully Inserted";
});

// Route::get('types/read',function(){
// 	$results = DB::select("SELECT * FROM types");
// 	return $results;
// });

// Route::get('types/read',function(){
// 	$results = DB::select("SELECT * FROM types");
// 	return var_dump($results);
// });


// Route::get('types/read',function(){
// 	$results = DB::select("SELECT * FROM types");
	
// 	foreach($results as $type){
// 		echo $type->name . "<br/>";
// 	}
// });


// Route::get('types/read',function(){
// 	$results = DB::select("SELECT * FROM types WHERE id=?",[3]);
	
// 	return $results;
// });


Route::get('students/insert',function(){
	DB::insert('INSERT INTO students(name,phonenumber,address) value(?,?,?)',['aung aung','1111','yangon']);
	return "Data Inserted";
});

Route::get('students/update',function(){
	// DB::update("UPDATE types SET name='ebook' WHERE id=?",[3]);
	// DB::update("UPDATE types SET name='pdf' WHERE id=?",['3']);

	return "Data Updated";
});


Route::get('shoppers/update',function(){
	DB::update("UPDATE shoppers SET fullname=?,phonenumber=?,city=? WHERE id=?",['kyaw kyaw','22222','bago','3']);

	return "Data Updated";
});

Route::get('shoppers/delete',function(){
	DB::delete('DELETE FROM shoppers WHERE id=?',[2]);

	return "Data Deleted";
});


Route::get('shoppers/read',function(){

	// $results = DB::select('SELECT * FROM shoppers');
	// return $results;

	// $results = DB::select('SELECT * FROM shoppers WHERE id=?',[6]);
	// return $results;

	// $results = DB::table('shoppers')->get();
	// return $results;


	// =>select(columns)
	// =>selectRaw(expression) // expression = conditionစစ်တာတွေပါတာကိုပြောတာ
	// => DB::raw(value) // parameter ၁ခုပဲရှိ

	// $results = DB::table('shoppers')->select('*')->get();
	// $results = DB::table('shoppers')->selectRaw('*')->get();

	// $results = DB::table('shoppers')->select(DB::raw('*'))->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('*'))->get();

	// $results = DB::table('shoppers')->select('*')->where('id',5)->get();
	// $results = DB::table('shoppers')->select('fullname')->where('id',5)->get();
	// $results = DB::table('shoppers')->select('fullname','phonenumber')->where('id',5)->get();
	// $results = DB::table('shoppers')->select('fullname','phonenumber','city')->where('id',5)->get();
	// $results = DB::table('shoppers')->select('fullname','phonenumber','city')->where('id','<>',5)->get();

	// $results = DB::table('shoppers')->select(DB::raw('*'))->where('id',5)->get();
	// $results = DB::table('shoppers')->select(DB::raw('fullname'))->where('id',5)->get();
	// $results = DB::table('shoppers')->select(DB::raw('fullname,phonenumber'))->where('id',5)->get();
	// $results = DB::table('shoppers')->select(DB::raw('fullname,phonenumber,city'))->where('id',5)->get();


	
	// $results = DB::table('shoppers')->selectRaw('*')->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw('fullname')->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw('fullname,phonenumber')->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw('fullname,phonenumber,city')->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw('fullname,phonenumber,city')->where('id','<>',5)->get();

	
	// $results = DB::table('shoppers')->selectRaw(DB::raw('*'))->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('fullname'))->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('fullname,phonenumber'))->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('fullname,phonenumber,city'))->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('fullname,phonenumber,city'))->where('id','<>',5)->get();

	// *error (select က count(*)ကိုမသိ columnsတွေပဲသိမယ်)
	// $results = DB::table('shoppers')->select('count(*) AS totalshopper,city')->where('id','<>',5)->groupBy('city')->get();

	// *oki (DB::raw() က count()တွေကိုသိတယ်)
	// $results = DB::table('shoppers')->select(DB::raw('count(*) AS totalshopper,city'))->where('id','<>',5)->groupBy('city')->get();


	//selectRaw()ကcount()ကိုလည်းသိတယ် DB::raw()မပါလည်းရ ပါလည်းဘာမှမထူး
	// $results = DB::table('shoppers')->selectRaw('count(*) AS totalshopper,city')->where('id','<>',5)->groupBy('city')->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('count(*) AS totalshopper,city'))->where('id','<>',5)->groupBy('city')->get();
	// return $results;

	// $results = DB::table('shoppers')->first(); //ရှေ့ဆုံးdataထွက်လာမှာ
	// return $results;


	// =>plunk(value,key) //value,key၂ခုလုံးက column nameတွေဖြစ်ရမယ်

	// $results = DB::table('shoppers')->pluck('fullname'); //array
	$results = DB::table('shoppers')->pluck('fullname','id'); //object
	return $results;


});


// =>Database Eloquent ORM
// sro 

// use App\Models\Article
Route::get('articles/read',function(){

	$articles = Article::all();
	return $articles;

	// $articles = Article::all();
	// return "$articles";

	// $articles = Article::all();
	// dd("$articles");
	// var_dump($articles);

	foreach($articles as $article){
		echo "$article->title <br/> $article->description <hr/>";
	}
});

Route::get('articles/find',function(){
	// $article = Article::find(5); //findကprimary keyပေးထားတဲ့ဟာနဲ့သွားအလုပ်လုပ်မှာ
	// return $article;

	// =Not Found Exception
	// $article = Article::findOrFail(20); //20ဆိုတဲ့dataမရှိရင် errorမပြဘဲနဲ့ not found page ပဲပြလိုက်တာ
	// return $article; //404 Not Found

	// $article = Article::findOrFail(10);
	// echo "$article->title <br/> $article->description <hr/>";

	
	// findOr('id',callback)
	$article = Article::findOr('50',function(){
		return "Hello sir there is no result for Primary ID 50";
	});
	return $article;
});

Route::get('articles/where',function(){

	// $articles = Article::where('user_id',2)->get();
	// return $articles;

	// = asc/desc
	// $articles = Article::where('user_id',1)->orderBy('id','desc')->get();
	// $articles = Article::where('user_id',1)->orderByDesc('id')->get();
	// return $articles;

	// $articles = Article::where('user_id',1)->orderBy('id','asc')->get();
	// return $articles;

	// $articles = Article::where('user_id',2)->orderBy('id','desc')->take(3)->get();
	// return $articles;

	// $articles = Article::where('user_id',2)->orderBy('id','asc')->limit(3)->get();
	// return $articles;

	// $articles = Article::where('user_id',2)->first();
	// return $articles;

	// $articles = Article::where('id',">",3)->get();
	// return $articles;

	// $articles = Article::where('id',2)->select('user_id','title','description')->get();
	// return $articles;

	// $articles = Article::where('id',2)->pluck('description'); //array
	// $articles = Article::where('id',2)->pluck('description','id'); //object
	// return $articles;

	// $articles = Article::firstWhere('user_id',2);
	// return $articles;


	// =Not Found Exception 

	// $articles = Article::where('id',">",5)->get();
	// return $articles;

	// $articles = Article::where('id',">",50)->firstOrFail();
	// return $articles; // if data does not exists 404 Not Found

	// firstOr(callback)
	$articles = Article::where('user_id',">",3)->firstOr(function(){
		return "Hello sir there is no result for User ID 3";
	});
	return $articles; 

});


// =>Retreving Aggregates

Route::get('articles/aggregates',function(){
	$data = [
		['price'=>100],
		['price'=>200],
		['price'=>300],
		['price'=>400],
	];

	// var_dump($data);
	// echo "<br/>";
	// var_dump(collect($data)); //array ကနေ object ပြောင်းသွားမှာ

	// dd($data,collect($data));

	// return collect($data)->count(); //4

	// return collect($data)->max(); //{"price":400}

	$result = collect($data)->max(function($num){
		return $num['price'];
	});
	return $result; // 400

	// return collect($data)->min(); //{"price":100}

	// return collect($data)->min(function($num){
	// 	return $num['price'];
	// }); //100


	// return collect($data)->average(function($num){
	// 	return $num['price'];
	// }); //250

	// return collect($data)->avg(function($num){
	// 	return $num['price'];
	// }); //250

	// return collect($data)->sum(function($num){
	// 	return $num['price'];
	// }); //1000



	// $articles = Article::all()->count();
	// return $articles; //10

	// $articles = Article::where('user_id',1)->count();
	// return $articles; //5

	// $articles = Article::where('user_id',2)->max('rating');
	// return $articles; //4


	// $articles = Article::where('user_id',1)->min('rating');
	// return $articles; //2

	// $articles = Article::where('user_id',1)->average('rating');
	// $articles = Article::where('user_id',1)->avg('rating');
	// return $articles; //3.6000

	// $articles = Article::where('user_id',1)->sum('rating');
	// return $articles; //18

});

// -------------------------------------------------------------------------

// =>Retrieving Or Creating Data to Model 

Route::get('articles/create',function(){

	// $article = Article::firstOrCreate([
	// 	'title'=>'this is new article 1'
	// ]);
	// return "Retrieve Data or insert $article";


	// $article = Article::firstOrCreate([
	// 	'title'=>'this is new article 15',
	// 	'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
	// 	'user_id'=>3,
	// 	'rating'=>2
	// ]);
	// return "Retrieve Data or insert $article";

	//ပထမarrကဟာကိုပဲတိုက်စစ်မှာ
	$article = Article::firstOrCreate(
		['title'=>'this is new article 17'],
		[
			'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
			'user_id'=>1,
			'rating'=>5
		]);
	return "Retrieve Data or insert $article";


});


Route::get('articles/filter',function(){
	
	// $articles = Article::all()->filter(function($article){
	// 	return $article->id > 5;
	// });

	// $articles = Article::get()->filter(function($article){
	// 	return $article->id > 5;
	// });

	$articles = Article::cursor()->filter(function($article){
		return $article->id > 3;
	});

	// all() get() cursor အကုန်အတူတူပဲ dataအကုန်ထုတ်ပေးမှာ
	
	foreach($articles as $article){
		echo "$article->id <br/> $article->title <br/> $article->desctiption <hr/>";
	}

});


Route::get('articles/reject',function(){
	$data = [
		100,
		200,
		300,
		0,
		'0',
		1,
		'1',
		'aung aung',
		'',
		' ',
		null,
		true,
		false,
		[],
		['red','green','blue'],
		['price'=>100]
	];

	// dd(
	// 	$data,
	// 	collect($data)
	// );

	$collections = collect($data);

	// return $collections->reject(); //{"3":0,"4":"0","8":"","10":null,"12":false,"13":[]}
	//sting, number(except 0), array,true တွေမပါဘဲကျန်တာပြန်ပါမယ်

	// return $collections->reject(function($value){
	// 	return empty($value); //rejectမှာမပါတဲ့ဟာတွေပြမှာ //{"0":100,"1":200,"2":300,"5":1,"6":"1","7":"aung aung","9":" ","11":true,"14":["red","green","blue"],"15":{"price":100}}
	// });

	return $collections->filter(function($value){
		// return $value; //{"0":100,"1":200,"2":300,"5":1,"6":"1","7":"aung aung","9":" ","11":true,"14":["red","green","blue"],"15":{"price":100}}
		// return empty($value); //{"3":0,"4":"0","8":"","10":null,"12":false,"13":[]}
		// return is_numeric($value); //[100,200,300,0,"0",1,"1"]
		// return is_string($value); //{"4":"0","6":"1","7":"aung aung","8":"","9":" "}
		// return is_bool($value); //{"11":true,"12":false}
		// return is_array($value); //{"13":[],"14":["red","green","blue"],"15":{"price":100}}
		return is_null($value); //{"10":null}

	});

	// reject နဲ့ filter နဲ့ကပြောင်းပြန်တွေ အဲ့ဒါကို empty()သုံးပြီးပြောင်းပြန်တွေလုပ်လို့ရတယ်

});


// =>whereColumn('column1','column2'); //compare and result same value
// =>whereColumn('column1','operator,'column2'); //compare and result same value
// =>whereColumn([
	// ['column1','column2'],
	// ['column1','column2']
// ]); //multi compare and result same value

Route::get('articles/wherecolumn',function(){
	// $articles = Article::whereColumn('id','user_id')->get(); //ဒီcolumn၂ခုမှာ dataတူတဲ့ဟာပဲထွက်လာမယ်
	// return $articles;

	// $articles = Article::whereColumn('created_date','updated_date')->get();
	// return $articles;

	// $articles = Article::whereColumn('updated_date','>','created_date')->orderByDesc('id')->get();
	// return $articles;

	// $articles = Article::whereColumn([
	// 	['id','user_id']
	// ])->get();
	// return $articles;

	$articles = Article::whereColumn([
		['id','user_id'],
		['created_date','updated_date']
	])->get();
	return $articles;

});


Route::get('articles/insert',function(){

	// သူ့နေရာနဲ့သူအသုံးဝင် method1 က conditionတွေစစ်ပြီးမှသုံးလို့ok

	// Method 1
	// $article = new Article;
	// $article->title = "this is new article 18";
	// $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
	// $article->user_id = 1;
	// $article->rating = 3;
	// $article->save(); //ဒီတိုင်းထည့်ရင် save ပေးမှ data ကဝင်မှာ

	// return "Data Inserted $article";


	// Method 2
	// $article = Article::create([
	// 	'title'=>"this is new article 21",
	// 	'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
	// 	'user_id'=>2,
	// 	'rating'=>5
	// ]);

	// return "Data Inserted $article";



	// echo now()->toDateTimeString();
	// echo now("Asia/Yangon")->toDateTimeString();
	// echo now("Asia/Bankokk")->toDateTimeString();

	// echo date("Y-m-d H:i:s");


	// date_default_timezone_set('Asia/Bankok');
	$getdate = now("Asia/Yangon")->toDateTimeString();
	$today = date("Y-m-d H:i:s");

	// use Carbon\Carbon 
	$curdatetime = Carbon::now();
	// echo $curdatetime;
	// var_dump($curdatetime); //object

	$article = DB::table('articles')->insert([
		'title'=>"this is new article 10",
		'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
		'user_id'=>2,
		'rating'=>5,
		'created_date'=>$getdate,
		'updated_date'=>$curdatetime
	]);

	return "Data Inserted $article";


});


Route::get('articles/update',function(){

	// $article = Article::find(1);
	// $article->title = "this is new article 01";
	// $article->save();

	// $article = Article::findOrFail(10);
	// $article->title = "this is new article 010";
	// $article->user_id = 4;
	// $article->save();
	// return "Data Updated $article";


	// = Mass Updates 

	// $article = Article::where('user_id',1)->update(['rating'=>2]);

	// $article = Article::where('user_id',2)->where('rating',5)->update(['rating'=>3]);

	// $article = Article::where('user_id',2)
	// 					->where('rating',5)
	// 					->update(['rating'=>3]);

	// return "Data Updated Successfully = $article";


	$article = Article::updateOrCreate(
		['title'=>'this is new title 01','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'],
		['user_id'=>1,'rating'=>5]
	);
	return "Data Updated or Create Successfully = $article";

});

Route::get('articles/delete',function(){

	// $article = Article::find(1);

	// $article = Article::findOrFail(2);
	// $article->delete();
	// return "Data Delete Successfully = $article";

	// $article = Article::where('rating',3)->delete();
	// return "Data Delete Successfully = $article";



	// Bulk Delete (Note :: must be primary key)
	// $article = Article::destroy(12);

	// $article = Article::destroy(10,11);

	// $article = Article::destroy([1,2,3,4]);
	// $article = Article::destroy(collect([7,8,9]));

	// return "Data Delete Successfully = $article";



	// = truncate (Be careful & ID will start 1 again)
	// Article::truncate();
	// return "Data Truncate Successfully";


	// $article = Article::findOrFail(1);
	// $article->delete();

	$article = Article::destroy(5,6,7);

	// $article = Article::destroy(8,9);

	$article = Article::destroy(collect([3,4]));

	return "Soft Delete Successfully = $article";


});

// SoftDelete ကဖျက်လိုက်တယ်ဆိုပေမယ့် deleted_at မှာပဲ dateတိုးသွားတာ restore လုပ်ရင် dateပြန်ပျောက်သွားမယ် , data select လုပ်ရင်တော့သိသာတယ် softdeleteလုပ်ထားရင် data ပြန်ပါမလာတော့ဘူး

Route::get('articles/restore',function(){

	// Article::withTrashed()->restore(); //အကုန်ပြန်ရတာ
	// return "Restore From Trash Successfully.";

	Article::withTrashed()->where('rating',5)->restore();
	return "Restore From Trash Successfully.";

});

Route::get('articles/forcedelete',function(){

	// $article = Article::findOrFail(1);
	// $article->delete();

	// $article = Article::findOrFail(2);
	// $article->forceDelete(); //softdelete ထဲမဝင်ဘဲနဲ့ ၁ခါတည်းလုံးဝအသေပျက်သွားတယ်

	// *Result = 404 Not Found. cuz 4 is already in soft delete
	// $article = Article::findOrFail(4);
	// $article->delete();

	// *Result = 404 Not Found. cuz 4 is already in soft delete
	$article = Article::findOrFail(4);
	$article->forceDelete();

	return "Data Force Delete Successfully";

});

Route::get('articles/gettrash',function(){

	// $articles = Article::all();
	// return $articles; // not include from trash

	// $articles = Article::withTrashed()->get();
	// return $articles; // all include from trash & non trash


	// $articles = Article::withTrashed()
	// 					->where('rating',3)
	// 					->get();
	// return $articles; // all include from trash & non trash by rating 3


	// $articles = Article::onlyTrashed()->get();
	// return $articles; // all data from trash only (trashထဲမှာရှိတဲ့ဟာအကုန်ပြ)


	// $articles = Article::onlyTrashed()
	// 				->where('rating',3)
	// 				->get();
	// return $articles; // all data from trash only by rating 3


	$articles = Article::onlyTrashed()->findOrFail(7);
	return $articles; // findနဲ့လည်းခေါ်ချင်တယ် trash ထဲကဟာလည်းခေါ်ချင်ရင်ဒီလိုသုံးတာ

});


Route::get('articles/restoresingle',function(){

	// $article = Article::findOrFail(1);
	// return $article; //404 NOT FOUND

	$article = Article::onlyTrashed()
				->findOrFail(1)
				->restore();
	return $article; // id=1 ၁ခုထဲကိုပဲ restoreပြန်လုပ်တာ

});

// ------------------------------------------------------------------------------------


// =>Eloquent Relationships 

// =One to One relationship 

Route::get('users/{id}/article',function($id){

	$article = User::findOrFail($id)->article->title;
	// $article = User::findOrFail($id)->article->description;
	// $article = User::findOrFail($id)->article->rating;

	return $article;

});

Route::get('articles/{id}/user',function($id){

	// $article = Article::findOrFail($id)->user->name;
	$article = Article::findOrFail($id)->user->email;

	return $article;
});


// =One to Many relationship 

Route::get('articles/{id}/byuser',function($id){
	// $user = User::findOrFail($id);
	// return $user->articles;

	$user = User::findOrFail($id);

	foreach($user->articles as $article){
		echo $article->title ."<br/>";
	}
});

// =Many to Many 
 
Route::get('user/{id}/role',function($id){
	// $user = User::findOrFail($id);
	// return $user->roles;

	// $user = User::findOrFail($id);

	// foreach($user->roles as $role){
	// 	echo $role->name . "<br/>";
	// }

	$user = User::findOrFail($id)->roles()->orderBy('id','asc')->get();
	return $user;
});

Route::get('users/{id}/rolecreatedate',function($id){

	$user = User::findOrFail($id);

	foreach($user->rolecreatedate as $role){
		echo $role->pivot->created_at . "<br/>";
	}

});


// = Has Many Through Relationship

Route::get('genders/{id}/article',function($id){

	$gender = Gender::findOrFail($id);

	foreach($gender->articles as $article){
		echo $article->title . "<br/>";
	}

});


// =>Polymorphic relationship 

Route::get('users/{id}/photo',function($id){
	
	$user = User::findOrFail($id);

	foreach($user->photos as $photo){
		echo $photo->path . "<br/>";
	}

});


Route::get('articles/{id}/photo',function($id){
	
	$article = Article::findOrFail($id);

	foreach($article->photos as $photo){
		echo $photo->path . "<br/>";
	}

});

//-----------------------------------------------------------

// = Reverse Thinking

Route::get('photos/{id}/result',function($id){

	// $photo = Photo::findOrFail($id);
	// return $photo->imageable;
	// return $photo->imageable->title;

	$photo = Photo::findOrFail($id);
	return $photo->photoable;

});

//----

Route::get('articles/{id}/comment',function($id){


	$article = Article::findOrFail($id);
	
	foreach($article->comments as $comment){
		echo $comment->message . "<br/>";
	}

});

Route::get('users/{id}/comment',function($id){


	$user = User::findOrFail($id);
	
	foreach($user->comments as $comment){
		echo $comment . "<br/>";
	}

});

// -----------------------------------

// => Polymorphic Relationship Many to Many

Route::get('items/{id}/tag',function($id){

	$item = Item::findOrFail($id);

	foreach($item->tags as $tag){
		echo $tag->name . "<br/>";
	}

});

Route::get('tags/{id}/article',function($id){

	$tag = tag::findOrFail($id);

	foreach($tag->articles as $article){
		echo $article->title . "<br/>";
	}

});

Route::get('tags/{id}/item',function($id){

	$tag = tag::findOrFail($id);

	foreach($tag->items as $item){
		echo $item->name . "<br/>";
	}

});

// ----------------------------------------------------------------

Route::get('users/{id}/phone/insert',function($id){

	$user = User::findOrFail($id);

	// =Method 1
	// $phone = new Phone;
	// $phone->number = "09444444";
	// $phone->user_id = $user->id;
	// $phone->save();
	// return "Datca Inserted";

	// =Method 2
	// $phone = Phone::create([
	// 	'number'=>'09555555',
	// 	'user_id'=>$user->id
	// ]);
	// return "Data Inserted";

	// =Method 3 
	// $phone = new Phone([
	// 	'number'=>'09666666',
	// 	'user_id'=>$user->id
	// ]);
	// $user->phone()->save($phone);
	// return "Data Inserted";

	// =Method 4 (no need user id cuz use with phone())
	// $phone = new Phone([
	// 	'number'=>'09666666',
	// ]);
	// $user->phone()->save($phone);
	// return "Data Inserted";

	// =Method 5
	// $user->phone()->save(new Phone([
	// 	'number'=>'0911111',
	// 	'user_id'=>$user->id
	// ]));
	// return "Data Inserted";

	// =Method 6 (no need user id cuz use with phone())
	$user->phone()->save(new Phone([
		'number'=>'09222222',
	]));
	return "Data Inserted";

});

Route::get('users/{id}/phone/update',function($id){

	// $phone = Phone::whereUserId($id)->first(); //Single Update
	// $phone->number = "09-111-111";
	// $phone->save();
	// return "Data updated";

	$phones = Phone::whereUserId($id)->get(); // bulk update
	foreach($phones as $phone){
		$phone->number = "09-111-112";
		$phone->save();
	}
	return "Data updated";

});


Route::get('users/{id}/phone/read',function($id){
	$user = User::findOrFail($id);
	$user = $user->phone->number;

	return "Data reading = $user";
});

Route::get('users/{id}/phone/delete',function($id){
	// $user = User::findOrFail($id); //single delete (phone ဆို data ပထမဆုံး၁ခုပဲပျက်မယ်)
	// $user = $user->phone->delete();
	// return "Data Deleted";

	$user = User::findOrFail($id); // bulk delete (phone() ဆို အကုန်ပျက်မယ်)
	$user = $user->phone()->delete();
	return "Data Deleted";
});

// ----------------------------------------------------------------

// =>Eloquent One to Many relationship / hasMany(class)

Route::get('users/{id}/article/insert',function($id){

	$user = User::findOrFail($id);

	// =Method 1
	// $article = new Article;
	// $article->title = "this is new article 23";
	// $article->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry';
	// $article->user_id = $id;
	// $article->rating = 5;
	// $article->save();
	// return "Data Inserted";

	// =Method 2
	// $article = Article::create([
	// 	'title'=>'this is new article 24',
	// 	'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
	// 	'user_id'=>$id,
	// 	'rating'=>3,
	// ]);
	// return "Data Inserted";

	// =Method 3 
	// $article = new Article([
	// 	'title'=>'this is new article 25',
	// 	'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
	// 	'user_id'=>$id,
	// 	'rating'=>3,
	// ]);
	// $user->articles()->save($article);
	// return "Data Inserted";

	// =Method 4 (no need user id cuz use with articles())
	// $article = new Article([
	// 	'title'=>'this is new article 26',
	// 	'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
	// 	'rating'=>3,
	// ]);
	// $user->articles()->save($article);
	// return "Data Inserted";

	// =Method 5
	// $user->articles()->save(new Article([
	// 	'title'=>'this is new article 27',
	// 	'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
	// 	'user_id'=>$id,
	// 	'rating'=>5,
	// ]));
	// return "Data Inserted";

	// =Method 6 (no need user id cuz use with phone())
	$user->articles()->save(new Article([
		'title'=>'this is new article 28',
		'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
		'rating'=>5,
	]));
	return "Data Inserted";

});

Route::get('users/{id}/article/update',function($id){

	// $article = Article::whereUserId($id)->first(); //Single Update
	// $article->title = "this is new article 29";
	// $article->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry';
	// $article->rating = 1;
	// $article->save();
	// return "Data updated";

	// $articles = Article::whereUserId($id)->get(); // bulk update
	// foreach($articles as $article){
	// 	$article->title = "this is new article 001";
	// 	$article->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry';
	// 	$article->rating = 5;
	// 	$article->save();
	// }
	// return "Data updated";

	// Note:: find Userid and continue search Article id
	// $user = User::findOrFail($id); // Single update
	// $user->articles()->where('id','=',5)->update([
	// 	'title'=>'this is new article 1000',
	// 	'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
	// 	'rating'=>1
	// ]);
	// return "Data updated";

	// Note:: find Userid and continue search Article rating
	$user = User::findOrFail($id); // bulk update
	$user->articles()->where('rating','=',5)->update([
		'title'=>'this is new article 1000',
		'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
		'rating'=>3
	]);
	return "Data updated";

});


Route::get('users/{id}/article/read',function($id){
	$user = User::findOrFail($id);
	
	foreach($user->articles as $article){
		echo $article->title . "<br/>";
	}

});


Route::get('users/{id}/article/delete',function($id){

	// Beware:: In this case Article took soft delete 

	// Note::error, cuz this is one to many relationship 
	// $user = User::findOrFail($id);
	// $user->articles->delete();
	// return "Data Deleted";

	// $user = User::findOrFail($id); //single delete
	// $user->articles()->whereId(5)->delete();
	// return "Data Deleted";

	$user = User::findOrFail($id); // bulk delete
	$user->articles()->delete();
	return "Data Deleted";
});

// ----------------------------------------------------------------

// =>Eloquent Many to Many relationship / belongsToMany(class)

// Route::get('users/{id}/role/insert',function($id){
	
// 	// Note:: Make action to Role/Userrole table
// 	$user = User::findOrFail($id);

// 	$user->roles()->save(new Role([
// 		'name'=>'adviser'
// 	]));

// 	return "Data Inserted";

// });


Route::get('users/{id}/role/update',function($id){

	$user = User::findOrFail($id);

	if($user->has('roles')){
		foreach($user->roles as $role){
			if($role->name === "adviser"){
				$role->name = "co-worker";
				$role->save();
			}
		}
	}

	return "Data Updated";

});


Route::get('users/{id}/role/read',function($id){

	$user = User::findOrFail($id);

	if($user->has('roles')){
		foreach($user->roles as $role){
			echo $role->name . "<br/>";
		}
	}

});


Route::get('users/{id}/role/delete',function($id){

	// $user = User::findOrFail($id); // Single Delete 
	// foreach($user->roles as $role){
	// 	$role->whereId(4)->delete();
	// }
	// return "Data Deleted";


	$user = User::findOrFail($id); // Bulk Delete 
	$user->roles()->delete();
	return "Data Deleted";

});


Route::get('users/{id}/role/attach',function($id){

	// Note :: check Role table & Userrole table (no-action/action)
	// Note :: added role permission to user id (userroles tbမှာdata သွားထည့်မှာ)
	$user = User::findOrFail($id);
	$user->roles()->attach(5);
	return "Data Attached";

});


Route::get('users/{id}/role/detach',function($id){

	// Note :: check Role table & Userrole table (no-action/action)
	// Note ::romoved user permission for refer user id (userroles tbထဲမှာ အဲ့ idနဲ့ပက်သက်တာတွေအကုန်ပျက်တာ role tb မှာဘာမှလာမပျက်ဘူး)
	$user = User::findOrFail($id);
	$user->roles()->detach();
	return "Data Detached";

});


Route::get('users/{id}/role/sync',function($id){

	// sync က dataဖျက်ရုံပဲမဟုတ် မရှိရင် dataထည့်ပေးမယ်
	// Note :: check Role table & Userrole table (no-action/action)

	$user = User::findOrFail($id);

	// Meaning :: want to keep only role id 2 for refer user id 
	// $user->roles()->sync(2); // 2 ဖြစ်တဲ့ role ကိုပဲချန်ခဲ့မယ် ကျန်တဲ့roleအကုန်ပျက်သွားမယ်

	// Meaning :: want to keep only role id 2,4 for refer user id 
	// $user->roles()->sync([2,4]); // 2နဲ့4 ဖြစ်တဲ့ role ကိုပဲချန်ခဲ့မယ် ကျန်တဲ့roleအကုန်ပျက်သွားမယ်

	// Meaning :: want to keep existing role id 2,4 and add more role id 1,5 for refer user id
	$user->roles()->sync([1,2,4,5]);


	return "Data Synced";

});

// --------------------------------------------------------------------------------------------

// => Eloquent Polymorphic Relationship 

Route::get('users/{id}/photo/insert',function($id){

	$user = User::findOrFail($id);

	$user->photos()->save(new Photo([
		'path'=>'public\assets\photo\profile1.jpg'
	]));

	return "Data Inserted";

});


Route::get('articles/{id}/photo/insert',function($id){

	$article = Article::findOrFail($id);

	$article->photos()->create([
		'path'=>'public\assets\photo\articlepic5.jpg'
	]);

	return "Data Inserted";

});


Route::get('users/{id}/photo/read',function($id){

	$user = User::findOrFail($id);

	if($user->has('photos')){
		foreach($user->photos as $photo){
			echo $photo->path . "<br/>";
		}
	}

});


Route::get('users/{id}/photo/update',function($id){

	$user = User::findOrFail($id);
	$photo = $user->photos()->whereId(9)->first();
	$photo->path = 'public\assets\photo\userprofile1.jpg';
	$photo->save();

	return "Data Update";

});


Route::get('users/{id}/photo/updateimgtype',function($id){

	$user = User::findOrFail($id);
	$photo = Photo::findOrFail(16);

	$user->photos()->save($photo); // Update for App\Models\Article to App\Models\User

	return "Data Update";

});


Route::get('users/{id}/photo/delete',function($id){

	// $user = User::findOrFail($id); // Single Delete
	// $user->photos()->whereId(9)->delete(); 
	// return "Data Deleted";


	$user = User::findOrFail($id); // Bulk Delete
	$user->photos()->delete(); 
	return "Data Deleted";

});

// ----------------------------------------------------------------------

// => Eloquent Polymorphic Many to Many Relationship morphToMany()

Route::get('items/tag/{id}/insert',function($id){

	// Note :: Check Item table & Taggable table (action / action)

	$item = Item::create([
		'name'=>'Joey'
	]);

	$tag = Tag::findOrFail($id);
	$item->tags()->save($tag);

	return "Data Inserted";

});


Route::get('items/{id}/tag/read',function($id){

	$item = Item::findOrFail($id);

	if($item->has('tags')){

		foreach($item->tags as $tag){
			echo $tag->name . "<br/>";
		}

	}
});


Route::get('items/{id}/tag/update',function($id){

	// $item = Item::findOrFail($id);

	// if($item->has('tags')){

	// 	foreach($item->tags as $tag){
	// 		return $tag->whereId(4)->update([
	// 			'name'=>'Insect Killer'
	// 		]);
	// 	}

	// }



	// $item = Item::findOrFail($id); //created
	// $tag = Tag::findOrFail(4);
	// $item->tags()->save($tag);
	// return "Data Updated";

	// $item = Item::findOrFail($id); //added
	// $tag = Tag::findOrFail(6);
	// $item->tags()->attach($tag);
	// return "Data Attached";

	$item = Item::findOrFail($id); // remove or added if not data existed
	$item->tags()->sync([1,2,5]);
	return "Data Synced";

});


Route::get('items/{id}/tag/delete',function($id){

	// $item = Item::findOrFail($id);
	// if($item->has('tags')){

	// 	foreach($item->tags as $tag){
	// 		$tag->whereId(6)->delete();
	// 	}

	// }
	// return "Data Deleted";

	
	$item = Item::findOrFail($id);
	$item->tags()->delete();
	return "Data Deleted";

});


// ----------------------------------------------------------------------

// => Form CRUD

Route::resource('countries',CountriesController::class);

// Route::resource('countries',CountriesController::class)->except('destroy');
// Route::get('countries/delete/{id}',[CountriesController::class,'destroy'])->name('countries.delete');


Route::get('/dates',function(){

	$date = new DateTime();
	echo $date->format('d m Y'); // 07 10 2023
	echo "<br/>";

	$date = new DateTime();
	echo $date->format('Y m d'); // 2023 10 07
	echo "<br/>";

	echo $date->format('m d Y'); // 10 07 2023
	echo "<br/>";

	echo $date->format('d/m/Y');  // 07/10/2023
	echo "<br/>";

	echo $date->format('d-m-Y'); // 07-10-2023

	echo "<hr/>";


	$date = new DateTime('+5 day'); // 12 10 2023
	echo $date->format('d m Y');
	echo "<br/>";

	$date = new DateTime('+1 week'); // 14 10 2023
	echo $date->format('d m Y');

	echo "<hr/>";


	echo Carbon::now(); // 2023-10-07 20:46:36
	echo "<br/>";

	echo Carbon::now()->addDays(10); // 2023-10-17 20:46:36
	echo "<br/>";

	echo Carbon::now()->addDays(1)->diffForHumans(); // 23 hours from now
	echo "<br/>";

	echo Carbon::now()->addDays(3)->diffForHumans(); // 2 days from now
	echo "<br/>";

	echo Carbon::now()->addDays(10)->diffForHumans(); // 1 week from now
	echo "<br/>";


	echo Carbon::now()->subDays(1); // 2023-10-06 20:51:29
	echo "<br/>";

	echo Carbon::now()->subDays(1)->diffForHumans(); // 1 day ago
	echo "<br/>";

	echo Carbon::now()->subDays(3)->diffForHumans(); // 3 days ago
	echo "<br/>";

	echo Carbon::now()->subDays(10)->diffForHumans(); // 1 week ago
	echo "<br/>";


	echo Carbon::now()->addMonths(1); // 2023-11-07 20:57:31
	echo "<br/>";

	echo Carbon::now()->addMonths(1)->diffForHumans(); // 4 weeks from now
	echo "<br/>";

	echo Carbon::now()->addMonths(3)->diffForHumans(); // 2 months from now
	echo "<br/>";

	echo Carbon::now()->addMonths(10)->diffForHumans(); // 9 months from now
	echo "<br/>";


	echo Carbon::now()->subMonths(1); // 2023-09-07 21:00:03
	echo "<br/>";

	echo Carbon::now()->subMonths(1)->diffForHumans(); // 1 month ago
	echo "<br/>";

	echo Carbon::now()->subMonths(3)->diffForHumans(); // 3 months ago
	echo "<br/>";

	echo Carbon::now()->subMonths(10)->diffForHumans(); // 10 months ago
	echo "<br/>";


	echo Carbon::now()->yesterday()->diffForHumans(); // 1 day ago
	echo "<br/>";

	echo Carbon::now()->tomorrow()->diffForHumans(); // 2 hours from now(နောက်နေ့ရောက်ဖို့၂နာရီ‌လောက်ပဲလို‌တော့လို့)
	echo "<br/>";

});

Route::resource('products',ProductsController::class);
