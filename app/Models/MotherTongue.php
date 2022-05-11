<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class MotherTongue extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'mother_tongues';
    public $timestamps = false;
}
