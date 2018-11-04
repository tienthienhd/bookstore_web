<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'string|max:255',
            // 'description' => 'required|string|max:255',
            'description' => 'required|string',
            'saleprice' => 'required|integer|min:1',
            'purchasePrice' => 'required|integer|min:1',
            'state' => 'required|integer|min:1',
            'cover' => 'required|image|max:5120',
        ];
    }

    public function attributes(){
        return [
            'title' => __('validation.attributes.book.title'),
            'author' => __('validation.attributes.book.author'),
            'category' => __('validation.attributes.book.category'),
            'cover' => __('validation.attributes.book.cover'),
            'description' => __('validation.attributes.book.description'),
            'saleprice' => __('validation.attributes.book.saleprice'),
            'purchasePrice' => __('validation.attributes.book.purchasePrice'),
            'state' => __('validation.attributes.book.state'),
        ];
    }
}
