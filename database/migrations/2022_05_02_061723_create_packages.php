<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('price')->unsigned()->nullable();
            $table->integer('credit')->unsigned()->nullable();
            $table->integer('view_count')->unsigned()->nullable();
            $table->integer('shortlist_count')->unsigned()->nullable();
            $table->integer('package_validity')->unsigned()->nullable();
            $table->enum('browse_profile', ['0', '1'])->default('0')->comment('0=Yes, 1=No');
            $table->enum('shortlist_and_interest', ['0', '1'])->default('0')->comment('0=Yes, 1=No');
            $table->enum('send_mail', ['0', '1'])->default('0')->comment('0=Yes, 1=No');
            $table->enum('view_contacts', ['0', '1'])->default('0')->comment('0=Yes, 1=No');
            $table->enum('customer_support', ['0', '1'])->default('0')->comment('0=Yes, 1=No');
            $table->enum('contacts_visibility_to_others', ['0', '1'])->default('0')->comment('0=Yes, 1=No');
            $table->enum('chat_options', ['0', '1'])->default('0')->comment('0=Yes, 1=No');
            $table->enum('status', ['0', '1'])->default('1')->comment('0=Inactive, 1=Active');
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
        Schema::dropIfExists('packages');
    }
}
