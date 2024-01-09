<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPivotProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profileable_id',
        'profileable_type'
    ];


}
