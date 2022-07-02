<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Carbon\Carbon;

class BasicDetail extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    
    protected $table = 'basic_details';
    public $timestamps = false;

    public function getProfileImage(){
        return $this->hasOne(VerifyUser::class,'by_reg_id','reg_id');
    }

    public function getUserRegister(){
        return $this->hasOne(UserRegister::class,'id','reg_id');
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

    public function getInterestReceived(){
        return $this->hasOne(SendInterest::class,'by_reg_id','reg_id');
    }

    public function getInterestSent(){
        return $this->hasOne(SendInterest::class,'reg_id','reg_id');
    }

    public function getShortlist(){
        return $this->hasOne(Shortlist::class,'saved_reg_id','reg_id');
    }

    
    public function getCareer(){
        return $this->hasOne(CareerDetail::class,'reg_id','reg_id');
    }


    public function getIncome(){
        return $this->hasOneThrough(Income::class,CareerDetail::class,'reg_id','id','reg_id','income');
    }

    public function getOccupation(){
        return $this->hasOneThrough(Occupation::class,CareerDetail::class,'reg_id','id','reg_id','occupation');
    }

    public function getEducation(){
        return $this->hasOneThrough(Education::class,CareerDetail::class,'reg_id','id','reg_id','highest_qualification');
    }

    public function getAge() {
        // $dob1 = Carbon::parse($this->dob);
        // return $dob1->diffInYears(Carbon::now());
        // return Carbon::now()->diffInYears($this->dob);
    }


      

}
