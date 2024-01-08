<?php

namespace App\Http\Requests\BussinessProfile;

use Illuminate\Foundation\Http\FormRequest;

class StoreBussinessProfileRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'avg_monthly_sale' => ['nullable', 'numeric'],
            'latest_yearly_sale' => ['nullable', 'numeric'],
            'profit_margin_percentage' => ['nullable', 'numeric'],
            'expected_valuation' => ['nullable', 'numeric'],
            'real_valuation' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string'],
            'bussiness_categories_id' => ['nullable', 'exists:bussiness_categories,id'],
            'total_permanent_employee' => ['nullable', 'string', 'max:255'],
            'established_date' => ['nullable', 'date'],
            'created_by' => ['nullable', 'exists:users,id'],
            'updated_by' => ['nullable', 'exists:users,id'],
            'deleted_by' => ['nullable', 'exists:users,id'],


        ];
    }
}
