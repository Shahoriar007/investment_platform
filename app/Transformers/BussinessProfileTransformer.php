<?php

namespace App\Transformers;

use App\Models\BussinessProfile;
use League\Fractal\TransformerAbstract;

class BussinessProfileTransformer extends TransformerAbstract
{
    public function transform(BussinessProfile $bussinessProfile)
    {

        return [
            'id' => $bussinessProfile->id,
            'name' => $bussinessProfile->name,
            'company_name' => $bussinessProfile->company_name,
            'contact' => $bussinessProfile->contact,
            'email' => $bussinessProfile->email,
            'address' => $bussinessProfile->address,
            'avg_monthly_sale' => $bussinessProfile->avg_monthly_sale,
            'latest_yearly_sale' => $bussinessProfile->latest_yearly_sale,
            'profit_margin_percentage' => $bussinessProfile->profit_margin_percentage,
            'expected_valuation' => $bussinessProfile->expected_valuation,
            'real_valuation' => $bussinessProfile->real_valuation,
            'description' => $bussinessProfile->description,
            'bussiness_categories_id' => $bussinessProfile->bussiness_categories_id,
            'total_permanent_employee' => $bussinessProfile->total_permanent_employee,
            'established_date' => $bussinessProfile->established_date,

            'created_by' => $bussinessProfile->created_by,
            'updated_by' => $bussinessProfile->updated_by,
            'deleted_by' => $bussinessProfile->deleted_by,


        ];
    }
}
