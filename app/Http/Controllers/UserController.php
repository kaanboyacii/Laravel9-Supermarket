<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Comment;
use App\Models\FavoriteProduct;
use App\Models\Product;
use App\Models\orderProduct;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('home.user.index', [
            'setting' => $setting
        ]);
    }
    public function reviews()
    {
        $setting = Setting::first();
        $comments = Comment::where('user_id', '=', Auth::id())->get();
        return view('home.user.comments', [
            'comments' => $comments,
            'setting' => $setting
        ]);
    }
    public function favoriteproduct()
    {
        $favproducts = FavoriteProduct::where('user_id', '=', Auth::id())->get();
        return view('home.user.favoriteproduct', [
            'favproducts' => $favproducts
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $data = order::where('user_id', '=', Auth::id())->get();
        return view('home.user.orders', [
            'data' => $data
        ]);
    }
    public function orderdetail($id)
    {
        $order = Order::find($id);
        $orderproducts = orderProduct::where('order_id', '=', $id)->get();
        return view('home.user.orderdetail', [
            'order' => $order,
            'orderproducts' => $orderproducts
        ]);
    }

    public function deleteproduct($id)
    {
        $data = OrderProduct::find($id);
        $data->delete();
        return redirect()->back();
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
    public function reviewdestroy($id)
    {
        $data = Comment::find($id);
        $data->delete();
        return redirect(route('userpanel.reviews'));
    }
}
