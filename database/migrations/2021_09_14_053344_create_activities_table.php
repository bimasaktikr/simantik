<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('mitra_id');
            $table->foreign('mitra_id')->references('id')->on('mitra');
            $table->foreignId('job_id')->constrained();
            $table->string('tahun')->default('0');
            $table->double('waktu', 3 , 2)->default(0);
            $table->double('kualitas', 3 , 2)->default(0);
            $table->double('sikap', 3 , 2)->default(0);
            $table->double('ipk', 3 , 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
