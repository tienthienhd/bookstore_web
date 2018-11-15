<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|string|max:255|unique:users',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|alpha_num|max:11|unique:users',
            'address' => 'required|string|max:255'
        ];
    }

    public function attributes(){
        return [
            'username' => __('validation.attributes.user.username'),
            'fullname' => __('validation.attributes.user.fullname'),
            'email' => __('validation.attributes.user.email'),
            'password' => __('validation.attributes.user.password'),
            'phone' => __('validation.attributes.user.phone'),
            'address' => __('validation.attributes.user.address')
        ];
    }
}
