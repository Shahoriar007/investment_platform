<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_title' ,
        'company_name' ,
        'contact' ,
        'email' ,
        'location' ,
        'description' ,
        'linkedin' ,
        'royality',
        'post_type' ,
        'photo' ,
        'investment_amount',
        'industry',
        'postable_id',
        'postable_type',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function postable(): MorphTo
    {
        return $this->morphTo();
    }


}
