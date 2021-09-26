<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
			$table->foreignId('matkul_id');
			$table->string('pertemuan')->nullable();
			$table->date('tanggal')->nullable();
			$table->time('jam_awal')->nullable();
			$table->time('jam_akhir')->nullable();
			$table->string('status')->nullable();
			$table->string('link')->nullable();
			$table->boolean('is_send')->nullable();
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
        Schema::dropIfExists('jadwals');
    }
}
