<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'image' => ['required', 'mimes:jpeg,jpg,png,gif,svg', 'image'],
            'width' => ['nullable', 'integer'],
            'height' => ['nullable', 'integer'],
            'compress' => ['required','integer', 'min:0', 'max:100']
        ];
    }
}
