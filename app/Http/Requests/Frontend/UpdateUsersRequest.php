<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class UpdateUsersRequest extends Request
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
            'userID'            => 'required|integer',
            'specialization_id' => 'sometimes|required|integer',
            'license_number'    => 'sometimes|required'
        ];
    }
}
