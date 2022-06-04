<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class BasicDetail extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    
    protected $table = 'basic_details';
    public $timestamps = false;

    public function getCareer(){
        return $this->hasOne(CareerDetail::class,'reg_id','reg_id');
    }

    public function getLifeStyle(){
        return $this->hasOne(LifeStyle::class,'reg_id','reg_id');
    }

    public function getHeight(){
        return $this->hasOne(Height::class,'id','height');
    }

    public function getReligion(){
        return $this->hasOne(Religion::class,'id','religion');
    }

    public function getCaste(){
        return $this->hasOne(Caste::class,'id','caste');
    }

    public function getMotherTongue(){
        return $this->hasOne(MotherTongue::class,'id','mother_tongue');
    }

    public function getCity(){
        return $this->hasOne(City::class,'id','city');
    }

    public function getMarital(){
        return $this->hasOne(Marital::class,'id','marital_status');
    }

}
