<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_orders=Order::where('status',0)->get();
        $comfirm_orders=Order::where('status',1)->get();
        return view('order.index',compact('pending_orders','comfirm_orders'));
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
        //dd($request)

        //validation

        //data store
        $myorder=json_decode($request->order);
        $notes=$request->notes;

        $orderdate=date("Y-m-d");
        $totalamount=0;
        foreach ($myorder as $row) {
            $totalamount+=$row->price*$row->qty;
        }

        $order=new Order;
        $order->orderno=uniqid();
        $order->orderdate=$orderdate;
        $order->totalamount=$totalamount;
        $order->notes=$notes;
        $order->user_id=Auth::id();//current loginin user
        $order->save();
        //save in order table

        //save in orderdetail
        foreach ($myorder as $row) {
            $order->items()->attach($row->id,['quantity'=>$row->qty]);
            //items is get class method by Order.php
            //attach is save
        }

        //redirect
        
        return 'Sucessful Your Order!';

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function confirm($id)
    {
        $order=Order::find($id);
        $order->status=1;
        $order->save();
        return back();
    }
}
