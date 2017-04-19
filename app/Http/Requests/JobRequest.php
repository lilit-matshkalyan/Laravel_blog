<?php

namespace App\Http\Requests;
use Route;


class JobRequest extends Request
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
            'code' => 'required|unique:jobs,code,'.$id.'|max:255',
            'name' => 'required|max:255'
        ];
    }

}
