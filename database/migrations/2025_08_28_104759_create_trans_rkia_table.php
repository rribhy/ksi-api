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
        Schema::create('trans_rkia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('year');
            $table->string('no_audit_plan');
            $table->date('date_audit_plan');
            $table->text('closing');
            $table->foreignId('pic_id')->references('id')->on('users');
            $table->string('status');
            $table->smallInteger('version');
            $table->created_by();
            $table->updated_by();
            $table->timestamps();
        });

        Schema::create('trans_rkia_document', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rkia_id')->references('id')->on('trans_rkia');
            $table->longText('first_chapter');
            $table->longText('second_chapter');
            $table->longText('third_chapter');
            $table->longText('fourth_chapter');
            $table->longText('fifth_chapter');
            $table->longText('sixth_chapter');
            $table->longText('seventh_chapter');
            $table->string('status', 255);
            $table->longText('upgrade_reject');
            $table->smallInteger('version');
            $table->created_by();
            $table->updated_by();
            $table->timestamps();
            $table->string('no_document', 255);
            $table->timestamp('date_document');
        });

        Schema::create('trans_rkia_document_cc', function (Blueprint $table) {
            $table->foreignId('document_id')->references('id')->on('trans_rkia_document');
            $table->foreignId('user_id')->references('id')->on('users');
        });

        Schema::create('trans_rkia_summary', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rkia_id')->references('id')->on('trans_rkia');
            $table->unsignedBigInteger('instruction_id');
            $table->unsignedBigInteger('object_id');
            $table->unsignedBigInteger('type_id');
            $table->foreignId('pic_id')->references('id')->on('users');
            $table->foreignId('leader_id')->references('id')->on('users');
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->string('theme', 255);
            $table->bigInteger('cost_estimation');
            $table->unsignedBigInteger('risiko');
            $table->unsignedBigInteger('risk_rating_id');
            $table->created_by();
            $table->updated_by();
            $table->timestamps();
        });

        Schema::create('trans_rkia_summary_member', function (Blueprint $table) {
            $table->foreignId('summary_id')->references('id')->on('trans_rkia_summary');
            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_rkia_document');
        Schema::dropIfExists('trans_rkia');
        Schema::dropIfExists('trans_rkia_summary');
        Schema::dropIfExists('trans_rkia_summary_member');
        Schema::dropIfExists('trans_rkia_document_cc');
    }
};
