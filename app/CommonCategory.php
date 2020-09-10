<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonCategory extends Model
{
    public function common()
    {
    	return $this->hasMany(Leave::class, 'status');
    }
}
