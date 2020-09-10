<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{

    protected $table = 'employees';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'department_id',
        'role_id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'join_date',
        'resign_date',
        'gender',
        'salary',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function attendance(){
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
}