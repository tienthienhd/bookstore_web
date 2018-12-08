<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
           
            'description' => 'required|string',
           
            'star' => 'required|integer|min:0|max:5',
            
        ];
    }
    public function attributes(){
        return [
            'title' => __('validation.attributes.comment.title'),
           
            'description' => __('validation.attributes.comment.description'),
            'star' => __('validation.attributes.comment.star'),
            
        ];
    }
    
}
