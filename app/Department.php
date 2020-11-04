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

    public function employee()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }
    
    public static function boot() {
        parent::boot();

        static::deleting(function($del) {
             $del->role()->delete();
             $del->employee()->delete();
        });
    }
}
