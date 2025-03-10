<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatCamp extends Model
{
    use HasFactory;

    protected $table = 'alat_camp';

    protected $fillable = [
        'nama_alat',
        'deskripsi',
        'stok',
        'harga',
        'image'
    ];

    public function sewaAlat()
    {
        return $this->hasMany(SewaAlat::class);
    }
}
