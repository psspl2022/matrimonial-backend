<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class AdminRegister extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'admin_registers';
    public $timestamps = false;

  
    function getCountry(){
        return $this->hasOne(Country::class, 'id', 'state');
    }

    function getState(){
        return $this->hasOne(State::class, 'id', 'state');
    }
    
    function getCity(){
        return $this->hasOne(City::class, 'id', 'state');
    }
}
