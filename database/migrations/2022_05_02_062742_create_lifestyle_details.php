<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifestyleDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifestyle_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_id')->unsigned()->nullable();
            $table->enum('diet_habit', ['1', '2','3','4'])->comment('1=Vegetarain, 2=Non-Veg, 3=Jain, 4=Eggetarain');
            $table->enum('drink_habit', ['1', '2','3','4'])->comment('1=No, 2=Non-Yes, 3=Occasionally');
            $table->enum('smoking_habit', ['1', '2','3'])->comment('1=No, 2=Yes, , 3=Occasionally');
            $table->enum('open_to_pets', ['1','2'])->comment('1=NO, 2=Yes ');
            $table->enum('own_a_house', ['1','2'])->comment('1=NO, 2=Yes');
            $table->enum('own_a_car', ['1','2'])->comment('1=NO, 2=Yes');
            $table->string('language_i_speak',50)->nullable();
            $table->string('blood_group',5)->nullable();
            $table->enum('challenged', ['1', '2', '3'])->comment('1=None, 2=Physically, 3=Mentally');
            $table->enum('thalessemia', ['1', '2','3'])->comment('1=No, 2=Minor, 3=Major');
            $table->enum('hiv_pos', ['1','2'])->comment('1=NO, 2=Yes');
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
        Schema::dropIfExists('lifestyle_details');
    }
}
