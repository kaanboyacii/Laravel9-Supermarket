<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use App\Models\Setting;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        $data = ShopCart::where('user_id', Auth::id())->get();
        return view('home.user.shopcart', [
            'setting' => $setting,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $data = ShopCart::where('product_id', $id)->where('user_id', Auth::id())->first(); //check product for user
        if ($data) {
            $data->quantity = $data->quantity + $request->input('quantity');
        } else {
            $data = new ShopCart();
            $data->product_id = $request->input('product_id');
            $data->user_id = Auth::id();
            $data->quantity = $request->input('quantity');
        }
        $data->save();
        return redirect()->back()->with('info', 'Ürün Sepete Eklendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $data = ShopCart::where('product_id', $id)->where('user_id', Auth::id())->first(); //check product for user
        if ($data) {
            $data->quantity = $data->quantity + 1;
        } else {
            $data = new ShopCart();
            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = 1;
        }
        $data->save();
        return redirect()->back()->with('info', 'Ürün Sepete Eklendi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $data = ShopCart::where('user_id', Auth::id())->get();
        return view('home.user.order', [
            'total' => $request->total,
            'data' => $data
        ]);
    }
    public function storeorder(Request $request)
    {
        $cardcheck="True";
        if ($cardcheck = 'True') {
            $data = new Order();
            $data->name = $request->input('name');
            $data->address = $request->input('address');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->total = $request->input('total');
            $data->user_id = Auth::id();
            $data->ip = $_SERVER['REMOTE_ADDR'];
            $data->save();

            $datalist = ShopCart::where('user_id', Auth::id())->get();
            foreach ($datalist as $rs) {
                $data2 = new OrderProduct();
                $data2->user_id = Auth::id();
                $data2->product_id = $rs->product_id;
                $data2->order_id = $data->id;
                $data2->price = $rs->product->price;
                $data2->quantity = $rs->quantity;
                $data2->amount = $rs->quantity * $rs->product->price;
                $data2->save();
            }
            $data3 = ShopCart::where('user_id', Auth::id());
            $data3->delete();
            return redirect()->route('shopcart.ordercomplete')->with('success', 'Ürün Siparişi Başarıyla Tamamlandı');
        }
        else {
            return redirect()->back()->with('warning', 'Kredi Kartı Geçersiz');
        }
    }
    public function ordercomplete()
    {
        return view('home.user.ordercomplete');
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
        $data = ShopCart::find($id);
        $data->quantity = $request->input('quantity');
        $data->save();
        return redirect()->back()->with('success', 'Ürün Miktarı Değiştirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ShopCart::find($id);
        $data->delete();
        return redirect()->back()->with('info', 'Ürün Sepetten Silindi');
    }
}
