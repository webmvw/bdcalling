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

    public function team(){
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function delivered_by_info(){
        return $this->belongsTo(User::class, 'delivered_by', 'id');
    }

}
