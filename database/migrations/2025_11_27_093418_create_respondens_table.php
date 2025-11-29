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
        Schema::create('respondens', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_survey');
            $table->string('nama');
            $table->enum('usia', ['<17', '18-25', '26-30', '31-40', '>40']);
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->string('phone')->nullable();
            $table->string('language')->nullable();
            $table->integer('total_nilai')->default(0);
            $table
                ->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondens');
    }
};
