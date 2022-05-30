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

}
