<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class PaymentDeatail extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = "payment_details";
    protected $fillable = ['order_id','transaction_subject','transaction_id','transaction_status','amount','user_id','plan_id','payment_mode','transaction_message','signature','transaction_date'];

}
