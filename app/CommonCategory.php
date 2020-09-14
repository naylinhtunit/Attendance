<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonCategory extends Model
{
    public function leave()
    {
    	return $this->hasMany(Leave::class, 'status');
    }

    public function employee()
    {
    	return $this->hasMany(Employee::class, 'gender');
    }
}
