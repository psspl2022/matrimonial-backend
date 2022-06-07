<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class MemberShipPayment extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = "member_ship_payments";
    protected $fillable = ['reg_id','plan_id','amount','transaction_id','payment_status'];
}
