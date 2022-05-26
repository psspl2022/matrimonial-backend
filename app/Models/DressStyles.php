<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class DressStyles extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'dress_styles';
    public $timestamps = false;
}
