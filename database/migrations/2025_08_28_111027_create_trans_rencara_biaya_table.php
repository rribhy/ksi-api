<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trans_rencana_biaya', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rkia_id')->references('id')->on('trans_rkia');
            $table->longText('description');
            $table->string('status', 255);
            $table->longText('upgrade_reject');
            $table->smallInteger('version');
            $table->created_by();
            $table->updated_by();
            $table->timestamps();
        });

        Schema::create('trans_rencana_biaya_cc', function (Blueprint $table) {
            $table->foreignId('rencana_id')->references('id')->on('trans_rencana_biaya');
            $table->foreignId('user_id')->references('id')->on('users');
        });

        Schema::create('trans_rencana_biaya_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rencana_id')->references('id')->on('trans_rencana_biaya');
            $table->unsignedBigInteger('jenis_biaya_id');
            $table->unsignedBigInteger('komponen_biaya_id');
            $table->string('tw_1', 255);
            $table->string('tw_2', 255);
            $table->string('tw_3', 255);
            $table->string('tw_4', 255);
            $table->string('jumlah_unit', 255);
            $table->string('harga_unit', 255);
            $table->longText('keterangan');
            $table->date('bulan');
            $table->created_by();
            $table->updated_by();
            $table->timestamps();
        });

        Schema::create('trans_rencana_biaya_aktiva', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rencana_biaya_id')->references('id')->on('trans_rencana_biaya');
            $table->unsignedBigInteger('jenis_aktiva');
            $table->unsignedBigInteger('qty');
            $table->string('realisasi', 255);
            $table->unsignedBigInteger('harga_satuan');
            $table->longText('keterangan');
            $table->created_by();
            $table->updated_by();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_rencana_biaya_aktiva');
        Schema::dropIfExists('trans_rencana_biaya_detail');
        Schema::dropIfExists('trans_rencana_biaya_cc');
        Schema::dropIfExists('trans_rencana_biaya');
    }
};
