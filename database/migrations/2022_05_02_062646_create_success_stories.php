<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessStories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_stories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_id_1')->unsigned()->nullable();
            $table->integer('reg_id_2')->unsigned()->nullable();
            $table->string('marriage_photo',255)->nullable();
            $table->string('marriage_certificate',255)->nullable();
            $table->enum('maritial_status', ['0', '1'])->default('1')->comment('0=Inactive, 1=Active');
            $table->text('message')->nullable();
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
        Schema::dropIfExists('success_stories');
    }
}
