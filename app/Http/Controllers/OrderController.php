<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Order;





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
         *  Date 26/Apr/2017
         *  Updated by
         *  Date
        */

        // get current user id
        $user_id = $request->input('user_id');

        // return orders list
        $orders = Order::where('user_id', $user_id)->get();

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
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        /*  Show view
         *  Written by Harout Koja
         *  Date 26/Apr/2017
         *  Updated by
         *  Date
        */

        // return order full details
        $order = Order::find($id);

        $order->user;
        $order->location;

        return  response()->json($order);

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
        //

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
