<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis', 'jumlah', 'tanggal', 'keterangan'
    ];

    // Fungsi untuk mendapatkan total pemasukan/pengeluaran berdasarkan rentang tanggal
    public static function getTotalByJenis($jenis, $startDate, $endDate)
    {
        return self::where('jenis', $jenis)
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->sum('jumlah');
    }
}


