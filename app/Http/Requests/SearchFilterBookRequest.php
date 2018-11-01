<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFilterBookRequest extends FormRequest
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

    public function rules()
    {
         return [
            'searchString' => 'nullable|string|max:255',
            'refineCategory' => 'nullable|string|max:255',
        ];
    }

    public function attributes(){
        return [
            'searchString' => 'word-and-statement.search-key',
            'refineCategory' => 'word-and-statement.refine-key',
        ];
    }
}
