<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Register extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'registers';
    public $timestamps = false;
}
