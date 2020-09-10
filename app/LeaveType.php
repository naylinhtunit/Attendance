<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    //
    protected $table = 'leave_types';
    
    protected $fillable = [
        'company_id',
        'leave_name',
        'total_leave'
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_id');
    }
}