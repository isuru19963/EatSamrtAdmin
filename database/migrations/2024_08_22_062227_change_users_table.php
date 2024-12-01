<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('patient_mobile')->nullable();
            $table->string('alternative_number')->nullable();
            $table->string('patient_profile')->nullable();
            $table->string('patient_dob')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('patient_address')->nullable();
            $table->string('patient_city')->nullable();
            $table->string('smoke_category')->nullable();
            $table->string('smoke_items')->nullable();
            $table->string('smokeless_items')->nullable();
            $table->string('alchohol')->nullable();
            $table->string('alchohol_duration')->nullable();
            $table->string('other_drugs')->nullable();
            $table->string('medical_history')->nullable();
            $table->string('last_schedule_date')->nullable();
            $table->string('next_schedule_date')->nullable();
            $table->string('no_coun_completed')->nullable();
            $table->string('count_session')->nullable();
            $table->string('data')->nullable();
            $table->string('session1_data')->nullable();
            $table->string('session2_data')->nullable();
            $table->string('session3_data')->nullable();
            $table->string('patient_status')->nullable();
            $table->string('otp')->nullable();
            $table->string('other_drugs_name')->nullable();
            $table->string('patient_occupation')->nullable();
            
            $table->timestamps();
            
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
