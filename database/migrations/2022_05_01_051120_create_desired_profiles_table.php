<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesiredProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desired_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('reg_id')->unsigned()->nullable();
            $table->integer('min_age')->unsigned()->nullable();
            $table->integer('max_age')->unsigned()->nullable();
            $table->integer('min_height')->unsigned()->nullable();
            $table->integer('max_height')->unsigned()->nullable();
            $table->text('marital')->nullable()->comment(' 1=Never-Marrired, 2=Awaiting-divorce, 3=Divorced, 4=Widowed, 5=Anulled');
            $table->text('country')->nullable();
            $table->text('residential')->nullable();
            $table->text('religion')->nullable();
            $table->text('caste')->nullable();
            $table->text('mother_tongue')->nullable();
            $table->text('manglik')->nullable()->comment('1=Non-Manglik, 2=Anshik Manglik, 3=Manglik');
            $table->text('highest_education')->nullable();
            $table->text('occupation')->nullable();
            $table->integer('min_income')->unsigned()->nullable();
            $table->integer('max_income')->unsigned()->nullable();
            $table->text('diet')->nullable()->comment('1=Vegetarain, 2=Non-Veg, 3=Jain, 4=Eggetarain');
            $table->text('drinking')->nullable()->comment('1=No, 2=Non-Yes, 3=Occasionally');
            $table->text('smoking')->nullable()->comment('0=No, 1=Yes, 3=Occasionally');
            $table->text('challenged')->nullable()->comment('0=NULL, 1=Physically, 2=Mentally');
            $table->text('about_desired')->nullable();
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
        Schema::dropIfExists('desired_profiles');
    }
}
