<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Company;





class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*  Index view
         *  Written by Harout Koja
         *  Date 21/Apr/2017
         *  Updated by
         *  Date
        */

        // return companies  list
        $companies = Company::all();

        return  response()->json($companies);

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
        /*  Index view
         *  Written by Harout Koja
         *  Date 25/Apr/2017
         *  Updated by
         *  Date
        */

        // return company full details
        $company = Company::find($id);

        $company['category']        =  $company->category;
        $company['location']        =  $company->location;
        $company['users_companies'] =  $company->users_companies;

        return  response()->json($company);

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
