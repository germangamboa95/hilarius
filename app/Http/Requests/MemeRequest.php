<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemeRequest extends FormRequest
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
            'meme' => 'file|mimes:jpeg,bmp,png'
        ];
    }
}
