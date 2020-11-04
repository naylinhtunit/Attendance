<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = [
        'checkin_time', 'checkout_time', 'employee_id', 'company_id'
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
