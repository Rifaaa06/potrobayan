<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaAlat extends Model
{
    use HasFactory;

    protected $table = 'sewa_alat';

    protected $fillable = [
        'alat_camp_id',
        'user_id',
        'tanggal_sewa',
        'tanggal_pengembalian',
        'total_harga',
    ];

    public function alatCamp()
    {
        return $this->belongsTo(AlatCamp::class, 'alat_camp_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
