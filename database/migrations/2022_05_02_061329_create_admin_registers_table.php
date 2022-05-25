<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_registers', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('user_id',50);
            $table->string('name',50);
            $table->string('email',50)->nullable();
            $table->enum('gender', ['1', '2', '3'])->default('1')->comment('1=Male, 2=Female, 3=Others');
            $table->bigInteger('contact'); 
            // $table->bigInteger('alter_contact')->nullable();
            $table->text('address')->nullable();
            $table->integer('country')->unsigned()->nullable();
            $table->integer('state')->unsigned()->nullable();
            $table->integer('city')->unsigned()->nullable();     
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
        Schema::dropIfExists('admin_registers');
    }
}
