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
use App\Models\FavoriteProduct;
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
        $productscount = Product::where('category_id', $id)->get();
        $discountproducts = Product::where('category_id', $id)->limit(6)->get();
        $products = Product::where('category_id', $id)->paginate(6)->withQueryString();
        $favproducts = FavoriteProduct::where('user_id', '=', Auth::id())->get();
        return view('home.categoryproducts', [

            'category' => $category,
            'categorylist' => $categorylist,
            'lastproducts' => $lastproducts,
            'productscount' => $productscount,
            'products' => $products,
            'discountproducts' => $discountproducts,
            'setting' => $setting,
            'favproducts' => $favproducts
        ]);
    }

    public function index()
    {
        $sliderdata = Category::Where('parent_id', '=', 0)->get();
        $servicelist1 = Product::limit(18)->get();
        $shopcarttotal = ShopCart::where('user_id', Auth::id())->get();
        $lastproducts = Product::limit(6)->latest()->get();
        $lastfaqs = Faq::limit(3)->latest()->get();
        $mostsellerproducts = OrderProduct::select('product_id')
            ->groupBy('product_id')
            ->orderByRaw('COUNT(product_id) DESC')
            ->limit(6)
            ->get();
        $mosthasreviewproducts = Comment::select('product_id')
            ->groupBy('product_id')
            ->orderByRaw('COUNT(product_id) DESC')
            ->limit(6)
            ->get();
        return view('home.index', [
            'sliderdata' => $sliderdata,
            'servicelist1' => $servicelist1,
            'shopcarttotal' => $shopcarttotal,
            'lastproducts' => $lastproducts,
            'lastfaqs' => $lastfaqs,
            'mostsellerproducts' => $mostsellerproducts,
            'mosthasreviewproducts' => $mosthasreviewproducts
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
    public function personaldata()
    {
        $personaldata = Setting::first();
        return view('home.personaldata', [
            'personaldata' => $personaldata
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
        $data->status = 'Yeni';
        $data->ip = request()->ip();
        $data->save();
        return redirect()->route('product', ['id' => $request->input('product_id')])->with('success', 'Yorumunuz Gönderildi, Teşekkür Ederiz');
    }

    public function storefavorite($id)
    {
        $data = FavoriteProduct::where('product_id', $id)->where('user_id', Auth::id())->first(); //check product for user
        $data = new FavoriteProduct();
        $data->product_id = $id;
        $data->user_id = Auth::id();
        $data->save();
        return redirect()->back()->with('info', 'Ürün Favorilere Eklendi');
    }

    public function product($id)
    {
        $data = product::find($id);
        $setting = Setting::first();
        $images = DB::table('images')->where('product_id', $id)->get();
        $reviews = Comment::where('product_id', $id)->where('status', 'aktif')->get();
        $favproducts = FavoriteProduct::where('user_id', '=', Auth::id())->get();
        return view('home.product', [
            'data' => $data,
            'images' => $images,
            'setting' => $setting,
            'reviews' => $reviews,
            'favproducts' => $favproducts,
        ]);
    }
    public function getproduct(Request $request)
    {
        $search = $request->input('search');
        $count = Product::where('title', 'like', '%' . $search . '%')->get()->count();
        if ($count == 1) {
            $data = Product::where('title', 'like', '%' . $search . '%')->first();
            return redirect()->route('product', ['id' => $data->id, 'slug' => $data->slug]);
        }
        else{
            return redirect()->route('productlist', ['search' =>$search]);
        }
    }
    public function productlist($search){
        $datalist=Product::where('title','like','%'.$search.'%')->get();
        return view('home.search_products',['search'=>$search,'datalist'=>$datalist]);
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
