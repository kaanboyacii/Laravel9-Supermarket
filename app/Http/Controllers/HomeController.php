<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Message;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public static function maincategorylist(){
        return Category::Where('parent_id','=',0)->with('children')->get();
    }
    public function categoryproducts($id)
    {

        $category = Category::find($id);
        $categorylist = Category::Where('parent_id','=',0)->get();
        $lastproducts = Product::limit(6)->latest()->get();
       // $servicesx = DB::table('services')->where('category_id',$id)->get();
        $products = Product::where('category_id',$id)->get();
       // dd($products);
        return view('home.categoryproducts', [

            'category' => $category,
            'categorylist' => $categorylist,
            'lastproducts' => $lastproducts,
            'products' => $products
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderdata = Category::Where('parent_id','=',0)->get();
        $servicelist1 = Product::limit(18)->get();
        $setting = Setting::first();
        return view('home.index', [
            'sliderdata' => $sliderdata,
            'servicelist1' => $servicelist1,
            'setting' => $setting
        ]);
    }
    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', [
            'setting'=>$setting
        ]);
    }
    public function about()
    {
        $setting = Setting::first();
        return view('home.about', [
            'setting'=>$setting
        ]);
    }
    public function faq()
    {
        $setting = Setting::first();
        $datalist = Faq::all();
        $lastfaqs = Faq::limit(3)->latest()->get();
        return view('home.faq', [
            'setting'=>$setting,
            'datalist'=>$datalist,
            'lastfaqs'=>$lastfaqs
        ]);
    }
    public function storemessage(Request $request)
    {
        $data = New Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = request()->ip();
        $data->save();
        return redirect()->route('contact')->with('Başarılı','Mesajınız Gönderildi, Teşekkür Ederiz');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($id)
    {
        $data = product::find($id);
        $images = DB::table('images')->where('product_id',$id)->get();
        return view('home.product', [
            'data' => $data,
            'images' => $images,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
