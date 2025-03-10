<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_type extends Model
{
    use HasFactory;

    protected $table = 'order_types'; // Specify the table name

    protected $fillable = [
        'jenis_kunjungan',
        'harga_tiket',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
