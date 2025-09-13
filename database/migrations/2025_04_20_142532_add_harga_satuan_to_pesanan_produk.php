<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pesanan_produk', function (Blueprint $table) {
        $table->decimal('harga_satuan', 10, 2);  // Menambahkan kolom harga_satuan
    });
}

public function down()
{
    Schema::table('pesanan_produk', function (Blueprint $table) {
        $table->dropColumn('harga_satuan');  // Menghapus kolom harga_satuan
    });
}

};
