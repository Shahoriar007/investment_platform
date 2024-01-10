<?php

namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;


class PostTransformer extends TransformerAbstract
{


    public function transform(Post $post)
    {



        return [
            'id' => $post->id,
            'post_title' =>$post->post_title,
            'company_name' =>$post->company_name,
            'contact' =>$post->contact,
            'email' => $post->email,
            'location' => $post->location,
            'description' => $post->description,
            'royality' =>$post->royality,
            'post_type' =>$post->post_type,
            'investment_amount' =>$post->investment_amount,
            'industry' =>$post->industry,
            'linkedin' => $post->linkedin,
            'photo' => $post->photo,
            'created_by' =>$post->created_by,
            'updated_by' =>$post->updated_by,
            'deleted_by' =>$post->deleted_by,
            'profileable_type' => $post->profileable_type,
            'profileable_id' =>$post->profileable_id,
            'profileable' => $post->profileable,



        ];
    }



}
