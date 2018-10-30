<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OldBookRequest extends FormRequest
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
            'bookId' => 'required',
            'addQuantity' => 'required|integer|min:1',
        ];
    }

    public function attributes(){
        return [
            'bookId' => __('validation.attributes.book.bookId'),
            'addQuantity' => __('validation.attributes.book.addQuantity'),
        ];
    }
}
