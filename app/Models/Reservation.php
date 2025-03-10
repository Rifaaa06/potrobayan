<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'no_hp',
        'alamat',
        'jenis_kunjungan',
        'tanggal_datang',
        'jumlah_orang',
        'harga_tiket',
        'total_harga',
        'user_id',
        'order_type_id',
        'payment_status',
        'payment_method',
        'payment_reference',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderType()
    {
        return $this->belongsTo(Order_type::class);
    }
}
