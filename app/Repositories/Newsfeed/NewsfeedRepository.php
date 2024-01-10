<?php

namespace App\Repositories\Newsfeed;


use App\Models\Post;
use App\Models\BussinessProfile;
use App\Models\InvestorProfile;



class NewsfeedRepository
{

    private Post $modelPost;
    private BussinessProfile $modelBuussinessProfile;
    private InvestorProfile $modelInvestorProfile;

    public function __construct(Post $modelPost,BussinessProfile $modelBuussinessProfile, InvestorProfile $modelInvestorProfile )
    {
        $this->modelPost = $modelPost;
        $this->modelBuussinessProfile = $modelBuussinessProfile;
        $this->modelInvestorProfile = $modelInvestorProfile;
    }


    public function apiShow($includeProfileable)
    {

        try {
            $query = $this->modelPost->with('profileable')->latest();
            $data = $query->get();
            return $data;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }




}
