<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_id')->unsigned()->nullable(); 
            $table->enum('family_type', ['0','1', '2','3'])->default('0')->comment('0=NULL, 1=Nuclear, 2=Joint, 3=Others,');
            $table->enum('family_values', ['0','1', '2','3','4'])->default('0')->comment('0=NULL, 1=Liberal, 2=Orthodox, 3=Conservative, 4=Moderate,');
            $table->enum('family_status', ['0','1', '2','3'])->default('0')->comment('0=NULL, 1=Rich, 2=Upper-Class, 3=Middle-Class');
            $table->string('profile_handler_name',50)->nullable();
            $table->string('father_occupation',50)->nullable();
            $table->string('mother_occupation',50)->nullable();
            $table->integer('brother_count')->unsigned()->nullable(); 
            $table->integer('married_brother_count')->unsigned()->nullable(); 
            $table->integer('sister_count')->unsigned()->nullable(); 
            $table->integer('married_sister_count')->unsigned()->nullable();         
            $table->string('native_city',50)->nullable();
            $table->string('native_state',50)->nullable();
            $table->string('living_with_parent',50)->nullable();
            $table->integer('family_income')->unsigned()->nullable(); 
            $table->string('gotra_maternal',50)->nullable();
            $table->string('gotra',50)->nullable();
            $table->text('about_family')->nullable();
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
        Schema::dropIfExists('family_details');
    }
}
