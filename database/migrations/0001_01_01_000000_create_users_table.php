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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->id('provider_id');
            $table->id('perusahaan_id');
            $table->id('position_id');
            $table->string('status', 255);
            $table->string('type', 16);
            $table->string('name', 255);
            $table->string('npp', 255);
            $table->string('username', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('jabatan_provider', 255);
            $table->timestamp('email_verified_at');
            $table->string('password', 255);
            $table->string('nik', 255)->unique();
            $table->string('image', 255);
            $table->string('phone', 255);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
