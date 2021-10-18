<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Peserta_Undian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko')->default('Toko')->nullable(true);
            $table->string('NIK')->default('000000000000000000')->nullable(true);
            $table->string('Nama_Peserta')->default('nama_peserta')->nullable(true);
            $table->string('Alamat')->default('alamat')->nullable(true);
            $table->string('No_Hp')->default('038383883')->nullable(true);
            $table->string('No_Undian')->default('kosong')->nullable(true);
            $table->integer('usertype')->default(2)->nullable(true);
            $table->integer('undianRolling')->default(0)->nullable(true);
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
        Schema::dropIfExists('Peserta_Undian');
    }
}
