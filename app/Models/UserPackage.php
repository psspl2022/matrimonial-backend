<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class UserPackage extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'package_credit_details';
    public $timestamps = false;

    public function getPackage(){
        return $this->hasOne(Package::class,'id','package_id');
    }
}
