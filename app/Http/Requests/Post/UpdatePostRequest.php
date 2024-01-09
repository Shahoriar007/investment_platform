<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'linkedin' => 'nullable|string|max:255',
            'royality' => 'nullable|string|max:255',
            'post_type' => 'required|string|max:255',
            'investment_amount' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'photo' => 'nullable|string', // Assuming "photo" is an uploaded image file
            'created_by' => 'nullable|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
            'deleted_by' => 'nullable|exists:users,id',
            'profileable_type' => 'required|string',
            'profileable_id' => 'required|exists:bussiness_profiles,id|exists:investor_profiles,id'
        ];
    }
}
