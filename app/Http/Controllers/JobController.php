<?php

namespace App\Http\Controllers;

use Redirect;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Help;
use App\Job;
use App\Http\Requests\JobRequest;





class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*  Job List View
         *  Written by Harout Koja
         *  Date 15/Jun/2016
         *  Updated by
         *  Date
        */

        return  view('hr/jobs/list',['company'=>Help::company()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        /*  Job add new view
         *  Written by Harout Koja
         *  Date 15/Jun/2016
         *  Updated by
         *  Date
        */

        return  view('hr/jobs/create',[]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(JobRequest $request)
    {
        /*  Job add new ajax
         *  Written by Harout Koja
         *  Date 15/Jun/2016
         *  Updated by
         *  Date
        */

        $job = new Job;
        $job->code = $request->input('code');
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->save();

        return '{"data":"'.Help::languages('Added').'"}';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        /*  Job list ajax view
         *  Written by Harout Koja
         *  Date 15/Jun/2016
         *  Updated by
         *  Date
        */

        // Select all jobs
        $jobs = Job::all();

        $data=[];
        foreach($jobs as $value) {
            $arr = [];
            $options = '<button class="btn btn-xs simple-ajax-modal" href="jobs/'.$value->id.'/edit" ><i class="fa fa-pencil btn-link"></i></button>
                        <button class="btn btn-xs modal-delete" id="'.$value->id.'"><i class="fa fa-trash btn-link" ></i></button>';
            array_push($arr,$value->code,$value->name,$value->description,$options);
            array_push($data,$arr);
        }

        return ['data'=>$data];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        /*  Job edit selected view
           *  Written by Harout Koja
           *  Date 15/Jun/2016
           *  Updated by
           *  Date
          */

        // Find selected job
        $job = Job::find($id);

        return  view('hr/jobs/edit',['job'=>$job]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(JobRequest $request, $id)
    {

        /*  Job Edit record ajax
         *  Written by Harout Koja
         *  Date 15/Jun/2016
         *  Updated by
         *  Date
        */

        $job = Job::find($id);
        $job->code = $request->input('code');
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->save();

        return '{"data":"'.Help::languages('Edited').'"}';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        /*  Job delete ajax
         *  Written by Harout Koja
         *  Date 15/Jun/2016
         *  Updated by
         *  Date
        */

        // delete record
        Job::find($id)->delete();
        return $id;

    }

    public function __construct() {
        $this->middleware('auth');
    }

}
