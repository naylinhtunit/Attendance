<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $table = 'leaves';
    
    protected $fillable = [
        'company_id',
        'request_date',
        'actual_date',
        'status',
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_id');
    }

    public function common()
    {
    	return $this->belongsTo(CommonCategory::class, 'status');
    }
}
