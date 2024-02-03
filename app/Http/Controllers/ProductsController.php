<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=> 'required|unique:products,name',
            'price'=>'required|numberic',
            'image'=>'required|image|mimes:jpeg,jpg,png,gif,svg,ico|max:3072' //mime stands for Multipurpose Internet Mail Extension


            // 'title' => 'required|unique:articles,title|max:100', //uniqueမှာtitleကိုမထည့်ေပးလည်းရတယ်
            // 'stauts'=> 'required|in:active,inactive',
            // 'public_at'=>'nullable|date'

        ]);

        // => 1. Public folder (public/customfolder/)

        // $request->image->move('customfolder',$imagename);
        // $request->image->move(public_path('customfolder'),$imagename);


        // => 2. Storage Folder / Local Driver (storage/app/customfolder)

            // php artisan storage:link (ဒါက storage လို့ပြောပေမယ့် တကယ်ကpublicမှာပဲအဓိကအလုပ်လုပ်မှာ အဲ့ကြောင့်အရင်ကstorageအောက်မှာသိမ်းထားတဲ့ဟာကို publicအောက်ကိုရောက်အောင်ပို့ပေးချိတ်ဆက်ပေးတဲ့ဟာ )

            // $request->image->storeAs($customfolder,$imagename,optional drive); // optional drive=s3(aws)/googledrive

            // $request->image->store('path/');

            // use Illuminate\Support\Facades\Storage
            // Storage::disk('local')->put('$customfolder',$file,content,'optional'); // optional=public/private



            $product = new Product();
            $product->name  = $request['name'];
            $product->price  = $request['price'];

            $file = $request->file('image');

            if($file){

                $fname = $file->getClientOriginalName(); // user1.jpg

                // $imagenewname = date('ymdHis').$fname;
                // $imagenewname = time().$fname;
                $imagenewname = uniqid().$fname;

                // dd($imagenewname);

                $file->move('images',$imagenewname);

                $product->image = $imagenewname;

            }


            // if($file){

            //     $fname = $file->getClientOriginalName();

            //     $imagenewname = time().$fname;

            //     // $fileurl = $file->move('images',$imagenewname); // 	images\1696765573user1.jpg
            //     $fileurl = $file->move(public_path('images'),$imagenewname); // 	E:\laravelbatch1\lesson\excone\public\images\1696765533user1.jpg

            //     $product->image = $fileurl;

            // }


            // if($request->hasfile('image')){

            //     $fnameext = $file->getClientOriginalExtension(); // jpg
            //     $imagenewname = uniqid().'.'.$fnameext; // 652299784d1ee.jpg

            //     // dd($imagenewname);

            //     $file->storeAs('images',$imagenewname); // public_path ကို storeAs နဲ့သုံးလို့မရ moveနဲ့ပဲရမှာ

            //     $product->image = $imagenewname;

            // }


            // if($request->hasfile('image')){

            //     $fnameext = $file->extension(); // jpg
            //     $imagenewname = time().'.'.$fnameext; // 652299784d1ee.jpg

            //     // dd($imagenewname);

            //     $file->storeAs('public/images',$imagenewname);

            //     $product->image = $imagenewname;

            // }


            // if($request->hasfile('image')){

            //     $fnameext = $file->extension(); // jpg
            //     $imagenewname = time().'.'.$fnameext; // 1696767008.jpg

            //     // dd($imagenewname);

            //     $fileurl = $file->storeAs('public/images',$imagenewname); // public/images/1696767008.jpg

            //     $product->image = $fileurl;

            // }


            // if($request->hasfile('image')){

            //     // $fileurl = $file->store(); // sARnEtN5YaTLRvn9x01tbyZTdl1uaJf9tz9UXscF.jpg
            //     $fileurl = $file->store('images'); // images/WzZUjUUIf1XKdwi6WtrygpR3DZRJOMpG7reHUxm5.jpg
            //     $product->image = $fileurl;

            // }


            // if($request->hasfile('image')){

            //     $fnameext = $file->extension();
            //     $imagenewname = uniqid().'.'.$fnameext;

            //     // dd($file->get());
            //     // dd(file_get_contents($file));

            //     Storage::disk('local')->put('images/'.$imagenewname,$file->get());

            //     $product->image = $imagenewname;

            // }


            // if($request->hasfile('image')){

            //     $fnameext = $file->extension();
            //     $imagenewname = uniqid().'.'.$fnameext;

            //     // dd($file->get());
            //     // dd(file_get_contents($file));

            //     Storage::disk('local')->put('images/'.$imagenewname,file_get_contents($file),'public');
            //     //Storage နဲ့တော့filepathယူလို့မရဘူး သူက true falseပဲ return ပြန်ပေးမှာမလို့

            //     $fileurl = "public/app/images/". $imagenewname;
            //     $product->image = $fileurl;

            // }



            $product->save();
            return redirect(route('products.index'));

    }


    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',["product"=>$product]);
    }


    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit')->with('product',$product);
    }


    public function update(Request $request, string $id)
    {

            $product = Product::findOrFail($id);
            $product->name  = $request['name'];
            $product->price  = $request['price'];


            // delete old file and updated new file (For Public)
            // if($request->hasfile('image')){

            //     $path = public_path('images/').$product->image;

            //     if(File::exists($path)){
            //         File::delete($path);
            //     }

            // }


            // delete old file and updated new file (For any kind of Storage)
            if($request->hasfile('image')){

                $path = storage_path('app/public/images/').$product->image;

                // ဒါက database  နဲ့မဆိုင်ဘူး  ဒီfolder ထဲမှာပဲစစ်တ ာ ဒီထဲမှာ  ဒီfile ရှိလားစစ်တာ
                if(File::exists($path)){
                    File::delete($path);
                }

            }

            // update single file
            if($request->hasfile('image')){

                $file = $request->file('image');
                $fname = $file->getClientOriginalName();

                $imagenewname = uniqid().$fname;

                $file->move(public_path('images'),$imagenewname);

                $product->image = $imagenewname;

            }


            // if($request->hasfile('image')){

            //     $file = $request->file('image');
            //     $fnameext = $file->getClientOriginalExtension(); // jpg
            //     $imagenewname = uniqid().'.'.$fnameext; // 652299784d1ee.jpg

            //     $file->storeAs('public/images',$imagenewname); // public/images/asdjfoe.jpg

            //     $product->image = $imagenewname;

            // }


            // if($request->hasfile('image')){

            //     $file = $request->file('image');
            //     $fnameext = $file->extension(); // jpg
            //     $imagenewname = time().'.'.$fnameext; // 652299784d1ee.jpg

            //     // dd($imagenewname);

            //     $file->storeAs('public/images',$imagenewname);

            //     $product->image = $imagenewname;

            // }


            // // if($request->hasfile('image')){

            // //     $fnameext = $file->extension(); // jpg
            // //     $imagenewname = time().'.'.$fnameext; // 1696767008.jpg

            // //     // dd($imagenewname);

            // //     $fileurl = $file->storeAs('public/images',$imagenewname); // public/images/1696767008.jpg

            // //     $product->image = $fileurl;

            // // }


            // if($request->hasfile('image')){

            //     $file = $request->file('image');
            //     $fileurl = $file->store('public/images'); // images/WzZUjUUIf1XKdwi6WtrygpR3DZRJOMpG7reHUxm5.jpg
            //     $product->image = trim($fileurl,"public"); // beware: "/" issue, we have to check file path in database

            // }


            // if($request->hasfile('image')){

            //     $file = $request->file('image');
            //     $fnameext = $file->extension();
            //     $imagenewname = uniqid().'.'.$fnameext;

            //     // Storage::disk('local')->put('public/images/'.$imagenewname,$file->get(),'public');
            //     // Storage::disk('local')->put('public/images/'.$imagenewname,file_get_contents($file),'public');
            //     Storage::disk('local')->put('public/images/'.$imagenewname,File::get($file),'public');

            //     $product->image = $imagenewname;

            // }


            $product->save();
            return redirect(route('products.index'));

    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }
}

