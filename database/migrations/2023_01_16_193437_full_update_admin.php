<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FullUpdateAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('invite_by_user_code')->nullable();
            $table->string('invitation_email')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        Schema::create('leader_board', function (Blueprint $table) {
            $table->id();
            $table->string('user_code');
            $table->string('leader_place')->nullable();
            $table->string('badge')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_code');
            $table->string('notification_type');
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('related_table_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('mood_and_craving', function (Blueprint $table) {
            $table->id();
            $table->string('user_code');
            $table->string('challenge_id')->nullable();
            $table->string('mood')->nullable();
            $table->string('craving')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        Schema::create('push_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('user_code');
            $table->string('token')->nullable();
            $table->string('device_type')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('challenge_request', function (Blueprint $table) {
            $table->id();
            $table->string('challenge_by_user_code');
            $table->string('challenge_to_user_code')->nullable();
            $table->boolean('challenge_accept')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('user_code');
            $table->string('time_elapsed')->nullable();
            $table->string('challenge_start_date');
            $table->string('challenge_start_time');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('interval_time')->nullable();
            $table->string('badge_time')->nullable();
            $table->boolean('status')->default(1);
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
