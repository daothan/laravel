<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6,confirmed',
            'password_confirmation'=>'required'
        ];
    }

    public function messages(){
        return[
            'name.required'=>"Name is required",
            'name.unique'=>"Name is exist",

            'email.required'=>'Email is required',
            'email.email'=>'Invalid email',
            'email.unique'=>'Email is exists',

            'password.required'=>'Password is required',
            'password.min'=>'Password must more than 6 letters',
            'password.confirmed'=>'Password not matched',

            'password_confirmation.required' => "Confirmed password is required"
        ];
    }
}
