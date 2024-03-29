<?php

namespace App\Http\Requests\InvestorProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvestorProfileRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'investment_range' => ['nullable', 'numeric'],
            'designation' => ['nullable', 'string'],
            'linkedin_profile' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:1012' ],
            'created_by' => ['nullable', 'exists:users,id'],
            'updated_by' => ['nullable', 'exists:users,id'],
            'deleted_by' => ['nullable', 'exists:users,id'],


        ];
    }
}
