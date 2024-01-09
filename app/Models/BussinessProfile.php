<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class BussinessProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'company_name' ,
        'contact' ,
        'email' ,
        'address' ,
        'avg_monthly_sale' ,
        'latest_yearly_sale' ,
        'profit_margin_percentage',
        'expected_valuation' ,
        'real_valuation' ,
        'description' ,
        'bussiness_categories_id',
        'total_permanent_employee',
        'established_date',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'postable');
    }
}
