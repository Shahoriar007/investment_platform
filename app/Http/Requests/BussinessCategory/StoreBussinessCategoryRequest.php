<?php

namespace App\Http\Requests\BussinessCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreBussinessCategoryRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => ['required', 'string', 'max:255'],

        ];
    }
}