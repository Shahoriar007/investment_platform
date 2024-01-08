<?php

namespace App\Transformers;

use App\Models\InvestorProfile;
use League\Fractal\TransformerAbstract;

class InvestorProfileTransformer extends TransformerAbstract
{
    public function transform(InvestorProfile $investorProfile)
    {

        return [
            'id' => $investorProfile->id,
            'name' =>$investorProfile->name,
            'company_name' =>$investorProfile->company_name,
            'contact' =>$investorProfile->contact,
            'email' => $investorProfile->email,
            'location' => $investorProfile->location,
            'investment_range' =>$investorProfile->investment_range ,
            'designation' => $investorProfile->designation,
            'linkedin_profile' => $investorProfile->linkedin_profile,
            'photo' => $investorProfile->photo,
            'created_by' =>$investorProfile->created_by,
            'updated_by' =>$investorProfile->updated_by,
            'deleted_by' =>$investorProfile->deleted_by,


        ];
    }
}
