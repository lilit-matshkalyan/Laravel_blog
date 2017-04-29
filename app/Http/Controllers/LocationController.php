<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Help;
use App\Location;





class LocationController extends Controller
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

        if($company_id = Help::admin_user($request->input('token'))) {

            $request->input('limit') ? $limit = $request->input('limit') :  $limit = 10 ;
            $request->input('offset') ? $offset = $request->input('offset')-1 :  $offset = 0;

            // return locations list
            $locations = Location::where('company_id', $company_id)->limit($limit)->offset($offset*$limit)->get();

            return response()->json($locations);
        }
        else{
            return response()->json(['Error'=>'Out of your users permission range']);
        }

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

        if($company_id = Help::admin_user($request->input('token'))) {

            $location = Location::where('qr_code',$request->input('qr_code'))->first();

            if($location) {
                return response()->json(['Error' => 'QR Code must be unique']);
            }
            else {

                $locations = new Location;
                $locations->company_id = $company_id;
                $locations->qr_code = $request->input('qr_code');
                $locations->name = $request->input('name');
                $locations->address = $request->input('address');
                $locations->save();

                return response()->json(['Message' => 'Success']);
            }
        }
        else{
            return response()->json(['Error'=>'Out of your users permission range']);
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

        // return locations full details
        $location = Location::find($id);

        $location->company;

        return  response()->json($location);

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
         *  Date 28/Apr/2017
         *  Updated by
         *  Date
        */

        if($company_id = Help::admin_user($request->input('token'))) {

            $location = Location::where('qr_code',$request->input('qr_code'))->where('id','!=',$id)->first();

            if($location) {
                return response()->json(['Error' => 'QR Code must be unique']);
            }
            else {

                $locations = Location::find($id);
                $locations->company_id = $company_id;
                $locations->qr_code = $request->input('qr_code');
                $locations->name = $request->input('name');
                $locations->address = $request->input('address');
                $locations->save();

                return response()->json(['Message' => 'Success']);
            }
        }
        else{
            return response()->json(['Error'=>'Out of your users permission range']);
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
