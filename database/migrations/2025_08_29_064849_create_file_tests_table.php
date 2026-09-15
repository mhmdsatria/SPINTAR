<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_file_tests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('file_tests', function (Blueprint $table) {
            $table->id();
            $table->string('file_name'); // Nama file yang diunggah
            $table->string('file_path'); // Lokasi penyimpanan file
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('file_tests');
    }
};