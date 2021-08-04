<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDeliver extends Model
{
    use HasFactory;

    public function responsible_info(){
        return $this->belongsTo(User::class, 'responsible', 'id');
    }

    public function account(){
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

}
