<?php

namespace App\Http\Controllers;

use Redirect;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Help;
use App\Job;
use App\Employee;
use App\EmployeeContract;
use App\Http\Requests\EmployeeRequest;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        /*  Employees List datatable View
         *  Written by Harout Koja
         *  Date 20/Jun/2016
         *  Updated by
         *  Date
        */

        return view('hr/employees/list',['company'=>Help::company()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        /*  Employees add new form view
        *  Written by Harout Koja
        *  Date 20/Jun/2016
        *  Updated by
        *  Date
       */

        // select all jobs
        $jobs = Job::all();

        return view('hr/employees/create',['jobs'=>$jobs]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(EmployeeRequest $request)
    {
        /*  Employees add new record saving
        *  Written by Harout Koja
        *  Date 20/Jun/2016
        *  Updated by
        *  Date
       */

        // Add Contract
        $contract = new EmployeeContract;
        $contract->vacations = $request->input('vacations');
        $contract->bonuses = $request->input('bonuses');
        $contract->tickets = $request->input('tickets');
        $contract->pay_rise = $request->input('pay_rise');
        $contract->salles_percentage = $request->input('salles_percentage');
        $contract->basic_salary = $request->input('basic_salary');
        $contract->housing = $request->input('housing');
        $contract->transportation = $request->input('transportation');
        $contract->other_allowances = $request->input('other_allowances');
        $contract->salary = $request->input('salary');
        $contract->save();

        // Add Employee
        $employee  = new Employee;
        $employee->contract_id = $contract->id;
        $employee->job_id = $request->input('job_id');
        $employee->photo = $request->input('photo');
        $employee->first_name = $request->input('first_name');
        $employee->middle_name = $request->input('middle_name');
        $employee->last_name = $request->input('last_name');
        $employee->father_name = $request->input('father_name');
        $employee->gender = $request->input('gender');
        $employee->birth_day = $request->input('birth_day');
        $employee->joining_day = $request->input('joining_day');
        $employee->mobile = $request->input('mobile');
        $employee->email = $request->input('email');
        $employee->identity_card = $request->input('identity_card');
        $employee->passport = $request->input('passport');
        $employee->badje_number = $request->input('badje_number');
        $employee->save();

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
        /*  Employees List datatable ajax content
         *  Written by Harout Koja
         *  Date 20/Jun/2016
         *  Updated by
         *  Date
        */

        // Select all jobs
        $employees = Employee::all();

        $data=[];
        foreach($employees as $value) {
            $arr = [];
            $options = '<button class="btn btn-xs simple-ajax-modal" href="employees/'.$value->id.'/edit" ><i class="fa fa-pencil btn-link"></i></button>
                        <button class="btn btn-xs modal-delete" id="'.$value->id.'"><i class="fa fa-trash btn-link" ></i></button>';
            array_push($arr,$value->badje_number,$value->first_name.' '.$value->father_name.' '.$value->middle_name.' '.$value->last_name,@$value->job->name,$value->mobile,$value->email,$options);
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
        /*  Employees edit form view
        *  Written by Harout Koja
        *  Date 20/Jun/2016
        *  Updated by
        *  Date
       */

        // select all jobs
        $jobs = Job::all();

        // select current employee
        $employee = Employee::find($id);

        return view('hr/employees/edit',['jobs'=>$jobs,'employee'=>$employee]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EmployeeRequest $request, $id)
    {

        /*  Employees add new record saving
        *  Written by Harout Koja
        *  Date 20/Jun/2016
        *  Updated by
        *  Date
       */

        // Edit Employee
        $employee  = Employee::find($id);
        $employee->job_id = $request->input('job_id');
        $employee->photo = $request->input('photo');
        $employee->first_name = $request->input('first_name');
        $employee->middle_name = $request->input('middle_name');
        $employee->last_name = $request->input('last_name');
        $employee->father_name = $request->input('father_name');
        $employee->gender = $request->input('gender');
        $employee->birth_day = $request->input('birth_day');
        $employee->joining_day = $request->input('joining_day');
        $employee->mobile = $request->input('mobile');
        $employee->email = $request->input('email');
        $employee->identity_card = $request->input('identity_card');
        $employee->passport = $request->input('passport');
        $employee->badje_number = $request->input('badje_number');
        $employee->save();

        // Edit Contract
        $contract = EmployeeContract::find($employee->contract_id);
        $contract->vacations = $request->input('vacations');
        $contract->bonuses = $request->input('bonuses');
        $contract->tickets = $request->input('tickets');
        $contract->pay_rise = $request->input('pay_rise');
        $contract->salles_percentage = $request->input('salles_percentage');
        $contract->basic_salary = $request->input('basic_salary');
        $contract->housing = $request->input('housing');
        $contract->transportation = $request->input('transportation');
        $contract->other_allowances = $request->input('other_allowances');
        $contract->salary = $request->input('salary');
        $contract->save();

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

        /*  Employees delete selected
         *  Written by Harout Koja
         *  Date 20/Jun/2016
         *  Updated by
         *  Date
        */

        // delete record
        $employee = Employee::find($id);
        EmployeeContract::find($employee->contract_id)->delete();

        return $id;

    }

    public function __construct() {
        $this->middleware('auth');
    }

}
