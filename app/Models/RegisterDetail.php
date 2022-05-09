<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterDetail extends Model
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'career_details';
    public $timestamps = false;
}
