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
        Schema::create('setting_webs', function (Blueprint $table) {
            $table->id();

            $table->string('nama_usaha')->nullable();
            $table->string('nama_usaha_ar')->nullable();
            $table->string('logo_struk')->nullable();
            $table->string('alamat')->nullable();
            $table->string('footer_struk')->nullable();
            $table->string('token')->nullable();
            $table->integer('is_perm')->nullable();
            $table->dateTime('subs_date')->nullable();
            $table->dateTime('date_exp')->nullable();
            $table->integer('bulan')->nullable();
            $table->string('url_domain')->nullable();       

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_webs');
    }
};
