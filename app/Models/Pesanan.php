<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'user_id',
        'cabang',
        'metode_pembayaran',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'pesanan_produk')
                    ->withPivot('jumlah', 'harga')
                    ->withTimestamps();
    }
}
