<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class LifeStyle extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'lifestyle_details';
    public $timestamps = false;
    protected $fillable = ['diet_habit','drink_habit','smoking_habit','open_to_pets','own_a_house','own_a_car','blood_group','hiv_pos','thalessemia','challenged'];
}
