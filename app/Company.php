<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'company_id');
    }

    public function leave()
    {
        return $this->hasMany(Leave::class, 'company_id');
    }

    public function leaveType()
    {
        return $this->hasMany(LeaveType::class, 'company_id');
    }

    public function holiday()
    {
        return $this->hasMany(PublicHolidays::class, 'company_id');
    }

    public function role()
    {
        return $this->hasMany(Role::class, 'company_id');
    }

    public function department()
    {
        return $this->hasMany(Department::class, 'company_id');
    }
    
}