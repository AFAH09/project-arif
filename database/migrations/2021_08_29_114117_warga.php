<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Warga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->string('nama');
            $table->string('jenisKelamin');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->string('agama');
            $table->string('status');
            $table->string('negara');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('noKk');
            $table->string('rt');
            $table->string('rw');
            $table->string('alamat');
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
