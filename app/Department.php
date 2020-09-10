<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function role()
    {
        return $this->hasMany(Role::class, 'department_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
