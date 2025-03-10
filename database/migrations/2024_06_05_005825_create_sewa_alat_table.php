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
        Schema::create('sewa_alat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alat_camp_id');
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal_sewa');
            $table->date('tanggal_pengembalian');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();

            $table->foreign('alat_camp_id')->references('id')->on('alat_camp')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa_alat');
    }
};
