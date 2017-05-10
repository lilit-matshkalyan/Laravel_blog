<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use App\Order;
use App\User;
use App\Location;
use App\OrderItems;
use App\UserCompany;
use Help;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /*  Index view
         *  Written by Harout Koja
         *  Date 10/May/2017
         *  Updated by
         *  Date
        */

        // for company
        if( $company_id = Help::admin_user($request->input('token')) ){
            // return orders list
            $orders = Order::where('company_id',$company_id)->whereNull('approved')->get();
        }
        // for normal user and vip user
        elseif( $user_id = Help::system_user($request->input('token')) ){
            // return orders list
            $orders = Order::where('user_id',$user_id)->wherein('approved',[1,-1])->get();
        }
        // for guests
        else{
            // return orders list
            $orders = Order::where('remember_token',$request->input('token'))->wherein('approved',[1,-1])->get();
        }

        if(empty($orders))
            return  response()->json([]);

        foreach ($orders as $item){
            if($item->approved == 1)  { $item->approved = 2; $item->save(); }
            if($item->approved == -1) { $item->approved = -2; $item->save(); }
        }



        foreach ($orders as $item){
            $item->orderitem;
        }

        return  response()->json($orders);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        /*  store view
         *  Written by Harout Koja
         *  Date 4/May/2017
         *  Updated by
         *  Date
        */

        $user = User::where('remember_token',$request->input('token'))->first();
        $location = Location::where('qr_code',$request->input('qr_code'))->first();

        $order = new Order;

        // normal and VIP user
        if($user){
            $vip = UserCompany::where('user_id',$user->id)->where('company_id',$request->input('company_id'))->where('vip',1)->first();
            // normal user
            if(!$vip){
                if(!$location)
                    return response()->json(['Error'=>'QR code is invalid']);
                $order->location_id = $location->id;
                $order->company_id = $location->company_id;
                $order->user_id = $user->id;
            }
            // VIP user
            else{
                $order->user_id = $user->id;
                $order->company_id = $request->input('company_id');
            }
        }
        // guest
        else{
            $order->remember_token = $request->input('token');
            if(!$location)
                return response()->json(['Error'=>'QR code is invalid']);
            $order->location_id = $location->id;
            $order->company_id = $location->company_id;
        }

        // for all
        $order->count = $request->input('count');
        $order->amount = $request->input('amount');
        $order->comment = $request->input('comment');
        $order->save();

        foreach ($request->input('product_id') as $i => $item){
          $orders_items = new OrderItems;
            $orders_items->order_id = $order->id;
            $orders_items->price = $request->input('price')[$i];
            $orders_items->qty = $request->input('qty')[$i];
            $orders_items->product_id = $request->input('product_id')[$i];
          $orders_items->save();

        }

        return response()->json(['Message'=>'Success']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        /*  update view
         *  Written by Harout Koja
         *  Date 10/May/2017
         *  Updated by
         *  Date
        */

        if ($company_id =  Help::admin_user($request->input('token'))) {

            //edit order status
            $order = Order::where('company_id',$company_id)->where('id',$request->input('order_id'))->whereNull('approved')->first();

            if($order){
                $order->approved = $request->input('approved');
                $order->comment = $request->input('comment');
                $order->save();
                return response()->json(['Message'=>'Success']);
            }
            else
                return response()->json(['Error' => 'Out of your users permission range']);

        }
        else
            return response()->json(['Error' => 'Out of your users permission range']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //

    }


}
