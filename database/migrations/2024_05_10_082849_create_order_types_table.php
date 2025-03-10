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
        Schema::create('order_types', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kunjungan');
            $table->integer('harga_tiket');
            $table->timestamps();
        });

        // Insert default values
        DB::table('order_types')->insert([
            ['jenis_kunjungan' => 'Wisata', 'harga_tiket' => 3000],
            ['jenis_kunjungan' => 'Camping', 'harga_tiket' => 10000],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_types');
    }
};
