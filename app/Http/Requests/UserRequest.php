<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;





class UserRequest extends Request
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
        return [
            //
            'user_name' => 'required|unique:users,user_name,'. $this->get('user_id') .',user_id' ,
            'password' => 'required',
            'type' => 'required',
        ];
    }
}
