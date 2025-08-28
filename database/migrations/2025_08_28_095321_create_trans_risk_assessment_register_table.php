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
        Schema::create('trans_risk_assessment_register', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedBigInteger('type_id');
            $table->date('periode')->nullable();
            $table->unsignedBigInteger('unit_kerja_id');
            $table->text('sasaran');
            $table->unsignedBigInteger('risk_rating_id');
            $table->string('status', 255);
            $table->longText('upgrade_reject');
            $table->smallInteger('version');
            $table->created_by();
            $table->updated_by();
            $table->timestamps();
        });

        Schema::create('trans_risk_assessment_register_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('risk_register_id')->references('id')->on('trans_risk_assessment_register');
            $table->unsignedBigInteger('kode_resiko_id');
            $table->unsignedBigInteger('jenis_resiko_id');
            $table->string('id_resiko', 255);
            $table->string('nama_resiko', 255);
            $table->longText('peristiwa');
            $table->longText('penyebab');
            $table->longText('dampak');
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
        Schema::dropIfExists('trans_risk_assessment_register_detail');
        Schema::dropIfExists('trans_risk_assessment_register');
    }
};
