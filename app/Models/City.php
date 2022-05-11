<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class City extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'cities';
    public $timestamps = false;
}
