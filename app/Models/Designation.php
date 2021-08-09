<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    public function franchise(){
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }
}
