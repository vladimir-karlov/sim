<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimCard extends Model
{
    use HasFactory;
    
    public function account()
    {
        return $this->hasOne(Account::class,  "id", "account_id");
    }    
}
