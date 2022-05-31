<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_id')->unsigned()->nullable();
            $table->string('color',20)->nullable();
            $table->text('hobbies')->nullable();
            $table->string('interest',255)->nullable();
            $table->string('music',255)->nullable();
            $table->string('book',255)->nullable();
            $table->string('fav_read',255)->nullable();
            $table->string('dress',255)->nullable();
            $table->string('tv_show',255)->nullable();
            $table->string('movie_type',255)->nullable();
            $table->string('movie',255)->nullable();
            $table->string('sport',255)->nullable();
            $table->string('cuisine',255)->nullable();
            $table->string('dish',255)->nullable();
            $table->string('vacation_destination',255)->nullable();
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
        Schema::dropIfExists('likes_details');
    }
}
