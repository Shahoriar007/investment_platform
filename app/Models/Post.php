<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;



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
        'investment_amount',
        'industry',
        'profileable_id',
        'profileable_type',
    ];

    public function profileable(): MorphTo
    {
        return $this->morphTo();
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }



}
