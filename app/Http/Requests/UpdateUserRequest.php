<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "last_name"=> "required|string",
            "first_name"=> "required|string",
            "date_de_naissance"=> "required|date",
            "type"=> "required|min:1|max:2",
            "phone"=> "required|string",
            "email"=> "required|string",
            "password"=> "required|string"

        ];
    }
}
