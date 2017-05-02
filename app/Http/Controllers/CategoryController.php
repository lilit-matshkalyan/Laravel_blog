<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Help;
use App\Category;
use App\Location;




class CategoryController extends Controller
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
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */

        if($request->input('company_id')) {
            // get current company id
            $company_id = $request->input('company_id');
        }
        elseif($request->input('qr_code')){
            // get current company id
            $location =  Location::where('qr_code',$request->input('qr_code'))->first();
            @$company_id = $location->company_id;
        }
   

        $request->input('limit') ? $limit = $request->input('limit') :  $limit = 10 ;
        $request->input('offset') ? $offset = $request->input('offset')-1 :  $offset = 0;        

        // return root categories list
        $categories = Category::where('company_id', $company_id)->whereNull('parent_id')->limit($limit)->offset($offset*$limit)->get();

        if(isset($categories))
        foreach($categories as $item){
             $item->children;

            if(isset($item))
            foreach($item['children'] as $item2)
                $item2->children;

                if(isset($item2) )
                foreach($item2['children'] as $item3)
                    $item3->children;

                    if(isset($item3))
                    foreach($item3['children'] as $item4)
                        $item4->children;

                        if(isset($item4))
                        foreach($item4['children'] as $item5)
                            $item5->children;

        }

        return  response()->json($categories);

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
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */

        if($company_id = Help::admin_user($request->input('token'))) {

            $request->input('parent_id') > 0 ? $parent_id = $request->input('parent_id') : $parent_id = null;

            $category = new Category;
            $category->name = $request->input('name');
            $category->image = $request->input('image');
            $category->parent_id = $parent_id;
            $category->company_id = $company_id;
            $category->save();

            return response()->json(['Message'=>'Success']);
        }
        else{
            return response()->json(['Error'=>'Invalid username or password']);
        }


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
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */

        // return root categories list
        $categories = Category::find($id);

        return  response()->json($categories);

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
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */

        if($company_id = Help::admin_user($request->input('token'))) {

            $request->input('parent_id') > 0 ? $parent_id = $request->input('parent_id') : $parent_id = null;

            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->image = $request->input('image');
            $category->parent_id = $parent_id;
            $category->save();

            return response()->json(['Message'=>'Success']);
        }
        else{
            return response()->json(['Error'=>'Invalid username or password']);
        }

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
