<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->id();

            $table->string('soal_id');

            $table->text('pertanyaan');

            $table->string('jenis_soal');

            $table->string('jawaban_a');
            $table->string('jawaban_b');
            $table->string('jawaban_c');
            $table->string('jawaban_d');

            $table->string('jawaban_benar');

            $table->integer('poin');

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
        Schema::dropIfExists('pertanyaans');
    }
};
