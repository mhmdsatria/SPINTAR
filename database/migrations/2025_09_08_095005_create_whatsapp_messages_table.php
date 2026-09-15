<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('whatsapp_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsultasi_id')->nullable()->constrained('konsultasi')->onDelete('cascade');
            $table->string('sender'); // nomor WA pengirim
            $table->text('message');  // isi pesan
            $table->enum('direction', ['in','out']); // in = klien -> sistem, out = sistem -> klien
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('whatsapp_messages');
    }
};
