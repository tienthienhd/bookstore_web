<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
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
            'username' => 'required|string|max:255|unique:users,username,'.Auth::id(),
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'phone' => 'required|alpha_num|max:11|unique:users,phone,'.Auth::id(),
            'address' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:5120',
        ];
    }

    public function attributes(){
        return [
            'username' => __('validation.attributes.user.username'),
            'fullname' => __('validation.attributes.user.fullname'),
            'email' => __('validation.attributes.user.email'),
            'phone' => __('validation.attributes.user.phone'),
            'address' => __('validation.attributes.user.address'),
            'avatar' => __('validation.attributes.user.avatar'),
        ];
    }
}
