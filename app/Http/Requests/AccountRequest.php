<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        return[
            'name'=>'required|unique:accounts|max:100',

            'email'=>'required|unique:accounts|email',
            'password'=>'required|min:6||confirmed',

            'password_confirmation' => 'required',

            'file' => 'image|max:5000'
        ];
    }

    public function messages(){
        return[
            'name.required'=> "Name is required",
            'name.max' => "Name must less than 100 letters",
            'name.unique' => "Name is exists",

            'email.required' => "Email is required",
            'email.unique' => "Email is exists",
            'email.email' => "Invalid email",

            'password.required' => "Password is required",
            'password.min' => "Password must more than 6 letters",
            'password.confirmed' => 'Password not matched',

            'password_confirmation.required' => "Confirmed password is required",

            'file.image' => "This is not a picture",
            'file.max' => "Your picture must less than 10Mb"
        ];
    }
}
