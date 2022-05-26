<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class BookTypes extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'book_types';
    public $timestamps = false;
}
