<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Message;
use App\Models\Comment;
use App\Models\ShopCart;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\OrderProduct;

class HomeController extends Controller
{
    public static function maincategorylist()
    {
        return Category::Where('parent_id', '=', 0)->with('children')->get();
    }
    public function categoryproducts($id)
    {

        $category = Category::find($id);
        $categorylist = Category::Where('parent_id', '=', 0)->get();
        $lastproducts = Product::limit(6)->latest()->get();
        // $servicesx = DB::table('services')->where('category_id',$id)->get();
        $setting = Setting::first();
        $products = Product::where('category_id', $id)->get();
        return view('home.categoryproducts', [

            'category' => $category,
            'categorylist' => $categorylist,
            'lastproducts' => $lastproducts,
            'products' => $products,
            'setting' => $setting,
        ]);
    }

    public function index()
    {
        $sliderdata = Category::Where('parent_id', '=', 0)->get();
        $servicelist1 = Product::limit(18)->get();
        $shopcarttotal = ShopCart::where('user_id', Auth::id())->get();
        $lastproducts = Product::limit(6)->latest()->get();
        // $mostsellerproducts = OrderProduct::orderBy('product_id', 'desc')->limit(3)->get();
        $mostsellerproducts = OrderProduct::select('product_id')
            ->groupBy('product_id')
            ->orderByRaw('COUNT(product_id) DESC')
            ->limit(6)
            ->get();
        return view('home.index', [
            'sliderdata' => $sliderdata,
            'servicelist1' => $servicelist1,
            'shopcarttotal' => $shopcarttotal,
            'lastproducts' => $lastproducts,
            'mostsellerproducts' => $mostsellerproducts
        ]);
    }
    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', [
            'setting' => $setting
        ]);
    }
    public function about()
    {
        $setting = Setting::first();
        return view('home.about', [
            'setting' => $setting
        ]);
    }
    public function faq()
    {
        $setting = Setting::first();
        $datalist = Faq::all();
        $lastfaqs = Faq::limit(3)->latest()->get();
        return view('home.faq', [
            'setting' => $setting,
            'datalist' => $datalist,
            'lastfaqs' => $lastfaqs
        ]);
    }
    public function storemessage(Request $request)
    {
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = request()->ip();
        $data->save();
        return redirect()->route('contact')->with('success', 'Mesajınız Gönderildi, Teşekkür Ederiz');
    }
    public function storecomment(Request $request)
    {
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->product_id = $request->input('product_id');
        $data->subject = $request->input('subject');
        $data->comment = $request->input('comment');
        $data->rate = $request->input('rate');
        $data->ip = request()->ip();
        $data->save();
        return redirect()->route('product', ['id' => $request->input('product_id')])->with('success', 'Yorumunuz Gönderildi, Teşekkür Ederiz');
    }

    public function product($id)
    {
        $data = product::find($id);
        $setting = Setting::first();
        $images = DB::table('images')->where('product_id', $id)->get();
        $reviews = Comment::where('product_id', $id)->where('status', 'aktif')->get();
        return view('home.product', [
            'data' => $data,
            'images' => $images,
            'setting' => $setting,
            'reviews' => $reviews
        ]);
    }

    public function login()
    {
        return view(view: 'admin.login');
    }
    public function logincheck(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();


                return redirect()->intended('admin');
            }
            return back()->withErrors([
                'error' => 'The provided credentials do not match our'
            ]);
        } else {
            return view('admin.login');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginuser');
    }
}
