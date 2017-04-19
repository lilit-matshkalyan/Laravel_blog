<?php

namespace App\Http\Requests;
use Route;


class EmployeeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->get('id');

        return [
            'salary' => 'required|max:11g m',
            'job_id' => 'required|max:11',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required|max:255',
            'birth_day' => 'required|max:255',
            'joining_day' => 'required|max:255',
            'mobile' => 'required|unique:employees,mobile,'.$id.'|max:255',
            'email' => 'required|unique:employees,email,'.$id.'|max:255',
            'identity_card' => 'required|unique:employees,identity_card,'.$id.'|max:255',
            'passport' => 'required|unique:employees,passport,'.$id.'|max:255',
            'badje_number' => 'required|unique:employees,badje_number,'.$id.'|max:255',
        ];
    }

}
