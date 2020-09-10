<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicHolidays extends Model
{
    //
    protected $table = 'public_holidays';
    
    protected $fillable = [
        'company_id',
        'holiday_date',
        'holiday_name',
        'year'
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_id');
    }
}
