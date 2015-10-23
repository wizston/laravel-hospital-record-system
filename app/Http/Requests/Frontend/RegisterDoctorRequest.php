<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class RegisterDoctorRequest extends Request
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

            'name' 		        => 'required|max:255',
            'email' 	        => 'required|email|max:255|unique:users',
            'password'          => 'required|confirmed|min:6',
            'specialization_id' => 'required|integer',
            'license_number'    => 'required'
        ];
    }
}
