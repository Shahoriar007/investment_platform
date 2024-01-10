<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class InvestorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'user_id',
        'company_name' ,
        'contact' ,
        'email' ,
        'location' ,
        'investment_range' ,
        'proffession',
        'designation',
        'linkedin_profile' ,
        'photo' ,
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'profileable');
    }


}
