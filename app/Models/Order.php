<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function account_table(){
        return $this->belongsTo(Account::class, 'account', 'id');
    }

    public function responsible(){
        return $this->belongsTo(User::class, 'kam_id', 'id');
    }

}