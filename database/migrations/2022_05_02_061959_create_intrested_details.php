<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntrestedDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intrested_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('by_reg_id')->unsigned()->nullable();
            $table->integer('reg_id')->unsigned()->nullable();
            $table->enum('revert', ['0', '1','2'])->default('0')->comment('0=Wait, 1=Accept, 2=Decline');
            $table->integer('added_by')->unsigned()->nullable();
            $table->enum('status', ['0', '1'])->default('1')->comment('0=Inactive, 1=Active');
            $table->timestamp('created_on')->useCurrent();
            $table->timestamp('updated_on')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intrested_details');
    }
}
