<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class DesiredProfile extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'desired_profiles';
    public $timestamps = false;
    protected $fillable = ['reg_id', 'user_id', 'min_age', 'max_age', 'min_height', 'max_height', 'country', 'marital', 'residential', 'religion', 'caste', 'mother_tongue', 'manglik', 'highest_education', 'occupation', 'min_income', 'max_income', 'diet', 'drinking', 'smoking', 'challenged', 'about_desired'];
}
