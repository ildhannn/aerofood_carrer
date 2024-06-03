<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation.same' => 'Password Confirmation should match the Password',
        ];
        // $validator = Validator::make( $data, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        //     'password_confirmation' => 'required|min:8|same:password',
        // ], $messages)
        
        // if ($validator->fails()) {
        //     return back()->withInput()->withErrors($validator->messages());
        // }

        // return $validator;
        
    }

    public function messages() {
        return [
            'name' => "Nama Harus Diisi",
            'email' => "Email Harus Diisi",
            'password' => "Password Harus Diisi",
        ];
    }
    
}
