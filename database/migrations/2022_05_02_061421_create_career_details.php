<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_id')->unsigned()->nullable(); 
            $table->string('education_field', 50)->nullable();
            $table->integer('highest_qualification')->unsigned()->nullable();
            $table->string('schooling', 50)->nullable();
            $table->integer('ug_qualification')->unsigned()->nullable();
            $table->string('ug_clg',100)->nullable();
            $table->integer('pg_qualification')->nullable();
            $table->string('pg_clg',100)->nullable();
            $table->string('employement_sector', 50)->nullable();
            $table->string('occupation', 50)->nullable();
            $table->string('organization_name', 100)->nullable();
            $table->string('income', 50)->nullable();
            $table->text('express_yourself')->nullable();
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
        Schema::dropIfExists('career_details');
    }
}
