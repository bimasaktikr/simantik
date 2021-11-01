<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->default('');
            $table->string('email')->unique();
            $table->string('nik')->default('');
            $table->timestamp('email_verified_at')->now();
            $table->text('gender');
            $table->text('tanggallahir')->default('');
            $table->text('alamat');
            $table->text('kecamatan')->default('');
            $table->text('kelurahan')->default('');
            $table->text('nohp')->default('');
            $table->text('pendidikan')->default('SMA');
            $table->float('waktu', 3 , 2)->default(0);
            $table->float('kualitas', 3 , 2)->default(0);
            $table->float('sikap', 3 , 2)->default(0);
            $table->float('ipk', 3 , 2)->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('mitra');
    }
}
