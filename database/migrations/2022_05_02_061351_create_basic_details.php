<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_details', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('reg_id')->unsigned()->nullable(); 
            $table->string('name',100);
            $table->timestamp('dob')->nullable();
            $table->enum('maritial_status', ['0','1', '2','3','4','5'])->default('0')->comment(' 0=NULL, 1=Never-Marrired, 2=Awaiting-divorce, 3=Divorced, 4=Widowed, 5=Anulled');
            $table->integer('religion')->unsigned()->nullable();
            $table->integer('caste')->unsigned()->nullable();
            $table->integer('sub_caste')->unsigned()->nullable();
            $table->integer('mother_tongue')->nullable();
            $table->enum('horrorscope_match_required', ['0','1', '2'])->default('0')->comment('0=NULL, 1=No, 2=Yes');
            $table->integer('height')->unsigned()->nullable(); 
            $table->enum('manglik',['0', '1', '2'])->default('0')->comment('0=NULL, 1=No, 2=Yes');
            $table->integer('country')->unsigned()->nullable();
            $table->integer('state')->unsigned()->nullable();
            $table->integer('city')->unsigned()->nullable();
            $table->integer('pincode')->unsigned()->nullable();
            $table->integer('residence')->unsigned()->nullable();
            $table->integer('sect')->unsigned()->nullable();
            $table->enum('live_with_family', ['0', '1', '2'])->default('0')->comment('0=NULL, 1=Non-Manglik, 2=Anshik Manglik, 3=Manglik');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('basic_details');
    }
}
