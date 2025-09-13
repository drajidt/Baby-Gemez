<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'kategori',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Model Produk.php
public function pesanan()
{
    return $this->belongsToMany(Pesanan::class, 'pesanan_produk')  // Relasi ke pesanan
        ->withPivot('jumlah', 'harga');  // Pastikan kamu sudah definisikan pivot
}
public function kategori()
{
    return $this->belongsTo(Kategori::class);
}
    
    
}
