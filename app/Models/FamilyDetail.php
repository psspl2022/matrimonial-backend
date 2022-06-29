<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class FamilyDetail extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'family_details';
    public $timestamps = false;

    public function getIncome(){
        return $this->hasOne(Income::class,'id','family_income');
    }

    public function getMotherOccupation(){
        return $this->hasOne(Occupation::class,'id','mother_occupation');
    }

    public function getFatherOccupation(){
        return $this->hasOne(Occupation::class,'id','father_occupation');
    }

    public function getCity(){
        return $this->hasOne(City::class,'id','native_city');
    }
}
