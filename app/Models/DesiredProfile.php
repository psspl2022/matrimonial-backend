<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class DesiredProfile extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'desired_profiles';
    public $timestamps = false;
    protected $fillable = ['reg_id', 'user_id', 'min_age', 'max_age', 'min_height', 'max_height', 'country', 'marital', 'residential', 'religion', 'caste', 'mother_tongue', 'manglik', 'highest_education', 'occupation', 'min_income', 'max_income', 'diet', 'drinking', 'smoking', 'challenged', 'about_desired'];


    public function getMinAge(){
        return $this->hasOne(Age::class,'id','min_age');
    }

    public function getMaxAge(){
        return $this->hasOne(Age::class,'id','max_age');
    }

    public function getMinHeight(){
        return $this->hasOne(Height::class,'id','min_height');
    }

    public function getMaxHeight(){
        return $this->hasOne(Height::class,'id','max_height');
    }

    public function getMinIncome(){
        return $this->hasOne(Income::class,'id','min_income');
    }

    public function getMaxIncome(){
        return $this->hasOne(Income::class,'id','max_income');
    }

   

}
