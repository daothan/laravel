<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RestfulRequest extends FormRequest
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
            'name' => 'required|unique:restful|max:50',
            'email' => 'required|unique:restful|email',
            'age' => 'required|integer'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Name is required',
            'name.unique' => 'Name is exists',
            'name.max' => 'Name must less than 50 letters',

            'email.required' => 'Email is required',
            'email.unique' => 'Email is exists',
            'email.email' => 'Invalid email',

            'age.required' => 'Age is required',
            'age.integer' => 'Age must be numeric'
        ];
    }
}
