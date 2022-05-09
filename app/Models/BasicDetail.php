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

    // public function getBasic(){
    //     return $this->hasOne(CentreDetails::class,'id','centre_id');
    // }

}
