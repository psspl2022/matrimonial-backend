<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class LikeDetails extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'likes_details';
    public $timestamps = false;
    protected $fillable = ['reg_id','hobbies','interest','music','book','fav_read','dress','tv_show','movie_type','movie','sport','cuisine','dish','vacation_destination'];

    public function getColor(){
        return $this->hasOne(Color::class,'id','color');
    }

    public function getHobby(){
        return $this->hasOne(Hobbies::class,'id','hobbies');
    }

    public function getInterest(){
        return $this->hasOne(Interest::class,'id','interest');
    }

    public function getMusic(){
        return $this->hasOne(CMusicTypesity::class,'id','music');
    }

    public function getBook(){
        return $this->hasOne(BookTypes::class,'id','book');
    }

    public function getDress(){
        return $this->hasOne(CiDressStylesty::class,'id','dress');
    }

    public function getMovieType(){
        return $this->hasOne(Movietypes::class,'id','movie_type');
    }

    public function getSport(){
        return $this->hasOne(Sports::class,'id','sport');
    }

    public function getCuisine(){
        return $this->hasOne(Cuisines::class,'id','cuisine');
    }
}
