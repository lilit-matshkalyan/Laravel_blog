<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Classes\Help;
use App\Product;
use App\Category;


class ProductController extends Controller
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
         *  Date 28/Apr/2017
         *  Updated by
         *  Date
        */

        $category_id = $request->input('category_id');
        $request->input('limit') ? $limit = $request->input('limit') :  $limit = 10 ;
        $request->input('offset') ? $offset = $request->input('offset')-1 :  $offset = 0;

        // return products  list
        $product = Product::where('category_id',$category_id)->limit($limit)->offset($offset*$limit)->get();

        return  response()->json($product);

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
          *  Date 28/Apr/2017
          *  Updated by
          *  Date
         */

        // check for company admin
        $company_id = Help::admin_user($request->input('token'));

        // check for category in current company
        $categort = Category::where('id',$request->input('category_id'))->where('company_id',$company_id)->first();

        if($categort) {
            $product = new Product;
            $product->category_id = $request->input('category_id');
            $product->price = $request->input('price');
            $product->name = $request->input('name');
            $product->discription = $request->input('discription');
            $product->image = $request->input('image');
            $product->save();
            return response()->json(['Message'=>'Success']);
        }
        else
            return response()->json(['Error'=>'Out of your users permission range']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        /*  Show view
         *  Written by Harout Koja
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */

        // return product full details
        $product = Product::find($id);
        $product->cateory;
        return response()->json($product);

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

        /*  store view
                 *  Written by Harout Koja
                 *  Date 28/Apr/2017
                 *  Updated by
                 *  Date
                */

        // check for company admin
        $company_id = Help::admin_user($request->input('token'));

        // check for category in current company
        $categort = Category::where('id',$request->input('category_id'))->where('company_id',$company_id)->first();

        if($categort) {
            $product = Product::find($id);
            $product->category_id = $request->input('category_id');
            $product->price = $request->input('price');
            $product->name = $request->input('name');
            $product->discription = $request->input('discription');
            $product->image = $request->input('image');
            $product->save();
            return response()->json(['Message'=>'Success']);
        }
        else
            return response()->json(['Error'=>'Out of your users permission range']);
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
