<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
	
	public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function franchise(){
    	return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }
	
}
