<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberShipPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_ship_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_id')->unsigned()->nullable();
            $table->integer('plan_id')->unsigned()->nullable();
            $table->string('amount', 255)->nullable();
            $table->string('transaction_id',255)->nullable();
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_ship_payments');
    }
}
