<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    
    protected $fillable = [
        'company_id',
        'department_id',
        'role_name'
    ];

    public function company()
    {
    	return $this->belongsTo('App\Company', 'company_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Department', 'department_id');
    }
}
