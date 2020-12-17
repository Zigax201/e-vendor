<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' =>'bail, required, string, max:255',
            'description' => 'bail, required, string',
            'image' => 'bail, required, image, max:2048',
            'price' => 'bail, required',
            'rating' => 'bail, required',
            'quantity' => 'bail, required',
            'sold' => 'bail, required'
        ];
    }
}
