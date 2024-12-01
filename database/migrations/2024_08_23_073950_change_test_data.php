<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTestData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('test_for_client', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('patient_id')->nullable();
        //     $table->string('test_name')->nullable();
        //     $table->text('test_data')->nullable();
        //     $table->timestamps();
            
        // });

        // Schema::create('patient_session', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('user_id')->nullable();
        //     $table->string('session_name')->nullable();
        //     $table->string('precentage')->nullable();
        //     $table->timestamps();
            
        // });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('status')->after('email')->nullable();
            $table->string('country_id')->after('email')->nullable();
            $table->string('country')->after('email')->nullable();
            $table->string('city')->after('email')->nullable();
            $table->string('doctor_lname')->after('email')->nullable();
            $table->string('doctor_fname')->after('email')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
