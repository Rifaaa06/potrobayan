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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('alamat');
            $table->enum('jenis_kunjungan', ['Wisata', 'Camping']);
            $table->date('tanggal_datang');
            $table->integer('jumlah_orang');
            $table->integer('harga_tiket');
            $table->integer('total_harga');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_type_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_type_id')->references('id')->on('order_types')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
