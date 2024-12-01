<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_tests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->nullable();

            $table->string('fnsQ1')->nullable();
            $table->string('fnsQ2')->nullable();
            $table->string('fnsQ3')->nullable();
            $table->string('fnsQ4')->nullable();
            $table->string('fnsQ5')->nullable();
            $table->string('fnsQ6')->nullable();
            $table->string('fnslQ1')->nullable();
            $table->string('fnslQ2')->nullable();
            $table->string('fnslQ3')->nullable();
            $table->string('fnslQ4')->nullable();
            $table->string('fnslQ5')->nullable();
            $table->string('fnslQ6')->nullable();

            $table->string('S1atQ1')->nullable();
            $table->string('S1atQ2')->nullable();
            $table->string('S1atQ3')->nullable();
            $table->string('S1atQ4')->nullable();
            $table->string('S1tpQ1')->nullable();

            $table->string('S2maQ1')->nullable();
            $table->string('S2tpQ1')->nullable();
            $table->string('S2taQ1')->nullable();
            $table->string('S2taQ2')->nullable();
            $table->string('S2taQ3')->nullable();
            $table->string('S2taQ4')->nullable();
            $table->string('S2taQ5')->nullable();
            $table->string('S2taQ6')->nullable();
            $table->string('S2taQ7')->nullable();
            $table->string('S2taQ8')->nullable();
            $table->string('S2taQ9')->nullable();
            $table->string('S2taQ10')->nullable();
            $table->string('S2taQ11')->nullable();
            $table->string('S2taQ12')->nullable();

            $table->string('S3maQ1')->nullable();
            $table->string('S3tpQ1')->nullable();
            $table->string('S3taQ1')->nullable();
            $table->string('S3taQ2')->nullable();
            $table->string('S3taQ3')->nullable();
            $table->string('S3taQ4')->nullable();
            $table->string('S3taQ5')->nullable();
            $table->string('S3taQ6')->nullable();
            $table->string('S3taQ7')->nullable();
            $table->string('S3taQ8')->nullable();
            $table->string('S3taQ9')->nullable();
            $table->string('S3taQ10')->nullable();
            $table->string('S3taQ11')->nullable();
            $table->string('S3taQ12')->nullable();

            $table->string('S4maQ1')->nullable();
            $table->string('S4taQ1')->nullable();
            $table->string('S4taQ2')->nullable();
            $table->string('S4taQ3')->nullable();
            $table->string('S4taQ4')->nullable();
            $table->string('S4taQ5')->nullable();
            $table->string('S4taQ6')->nullable();
            $table->string('S4taQ7')->nullable();
            $table->string('S4taQ8')->nullable();
            $table->string('S4taQ9')->nullable();
            $table->string('S4taQ10')->nullable();
            $table->string('S4taQ11')->nullable();
            $table->string('S4taQ12')->nullable();

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
        Schema::dropIfExists('all_tests');
    }
}
