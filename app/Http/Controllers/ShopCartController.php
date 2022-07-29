<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use App\Models\Setting;
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
        $data = ShopCart::where('user_id',Auth::id())->get();
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
        $id=$request->id;
        $data = ShopCart::where('product_id',$id)->where('user_id',Auth::id())->first(); //check product for user
        if ($data){
            $data->quantity = $data->quantity + $request->input('quantity');
        } else {
            $data= new ShopCart();
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
        $data = ShopCart::where('product_id',$id)->where('user_id',Auth::id())->first(); //check product for user
        if ($data){
            $data->quantity = $data->quantity + 1;
        } else {
            $data= new ShopCart();
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
        $data = ShopCart::find($id);
        $data->quantity = $request->input('quantity');
        $data->save();
        return redirect()->back()->with('success','Ürün Miktarı Değiştirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= ShopCart::find($id);
        $data->delete();
        return redirect()->back()->with('info','Ürün Sepetten Silindi');
    }
}
