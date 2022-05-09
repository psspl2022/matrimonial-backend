<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('matrimony_id',50);
            $table->string('profile_for',50);
            $table->string('email',50)->nullable();
            $table->string('alter_email',50)->nullable();
            $table->bigInteger('contact'); 
            $table->bigInteger('alter_contact')->nullable();
            $table->bigInteger('landline')->nullable();
            $table->text('contact_address')->nullable();
            $table->text('parent_address')->nullable();
            $table->string('time_for_call',50)->nullable();
            $table->integer('stage_no')->unsigned()->nullable();          
            $table->enum('gender', ['1', '2', '3'])->default('1')->comment('1=Male, 2=Female, 3=Others');;
            $table->integer('added_by')->unsigned()->nullable();
            $table->enum('status', ['0', '1'])->default('1')->comment('0=Inactive, 1=Active');
            $table->timestamp('created_on')->useCurrent();
            $table->timestamp('updated_on')->useCurrent();
            $table->softDeletes();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
