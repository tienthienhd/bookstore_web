<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchBookRequest extends FormRequest
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
            'searchId' => 'nullable|integer|min:1',
            'searchAuthor' => 'nullable|string|max:255',
            'searchTitle' => 'nullable|string|max:255',
            'searchCategory' => 'nullable|string|max:255',
        ];
    }

    public function attributes(){
        return [
            'searchId' => __('validation.attributes.book.id'),
            'searchTitle' => __('validation.attributes.book.title'),
            'searchAuthor' => __('validation.attributes.book.author'),
            'searchCategory' => __('validation.attributes.book.category'),
        ];
    }
}
