<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class CareerDetail extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'career_details';
    public $timestamps = false;

    public function getIncome(){
        return $this->hasOne(Income::class,'id','income');
    }

    public function getOccupation(){
        return $this->hasOne(Occupation::class,'id','occupation');
    }

    public function getEducation(){
        return $this->hasOne(Education::class,'id','highest_qualification');
    }

    public function getUg(){
        return $this->hasOne(Education::class,'id','ug_qualification');
    }

    public function getPg(){
        return $this->hasOne(Education::class,'id','pg_qualification');
    }
    
}
