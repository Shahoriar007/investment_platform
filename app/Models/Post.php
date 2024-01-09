<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'created_by',
        'updated_by',
        'deleted_by',
    ];

}
