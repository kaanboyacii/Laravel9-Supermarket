<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $data=Order::where('status',$slug)->get();
        return view ('admin.order.index',[
            'data'=>$data
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
        $data=Order::find($id);
        $datalist=OrderProduct::where('order_id',$id)->get();
        return view ('admin.order.show',[
            'data'=>$data,
            'datalist'=>$datalist,
        ]);
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
        $data=Order::find($id);
        $data->status=$request->status;
        $data->note=$request->note;
        $data->save();
        return redirect()->route('admin.order.show',['id'=>$id]);
    }

    public function reject($id)
    {
        $data=Order::find($id);
        $data->status='Reddedildi';
        $data->save();
        return redirect()->back();
    }
    public function acceptproduct($id)
    {
        $data=OrderProduct::find($id);
        $data->status='Onaylandı';
        $data->save();
        return redirect()->back();
    }
    public function deleteproduct($id)
    {
        $data=OrderProduct::find($id);
        $data->status='Reddedildi';
        $data->save();
        return redirect()->back();
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
