<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('konsultasi', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('email');
        $table->string('nomor_whatsapp');
        $table->text('deskripsi_masalah');
        $table->string('file_path')->nullable();
        $table->date('tanggal_diajukan');
        $table->time('jam_diajukan');
        $table->string('status')->default('pending');
        $table->date('tanggal_baru')->nullable();
        $table->time('jam_baru')->nullable();
        $table->foreignId('assigned_to_admin_id')->nullable()->constrained('users');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};
