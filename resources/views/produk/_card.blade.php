<div class="bg-white/90 p-4 shadow-xl rounded-xl relative hover:shadow-2xl transition duration-300">
    <div class="relative">
        <img src="{{ asset('images/' . $item->gambar) }}" 
             alt="{{ $item->nama_produk }}" 
             class="w-full h-40 object-cover rounded-md mb-3">

        <span class="absolute top-2 right-2 bg-purple-700 text-white text-xs px-3 py-1 rounded-full shadow-md">
            Stok: {{ $item->stok }}
        </span>
    </div>

    <h4 class="text-lg font-bold text-center text-purple-800 mb-1">{{ $item->nama_produk }}</h4>
    <p class="text-center text-purple-600 font-semibold mb-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

    <form action="{{ route('keranjang.store') }}" method="POST">
        @csrf
        <input type="hidden" name="produk_id" value="{{ $item->id }}">

        <div class="flex items-center justify-center space-x-2 mb-3">
            <button type="button" onclick="this.nextElementSibling.stepDown()" 
                class="bg-purple-600 text-white px-3 py-1 rounded-md hover:bg-purple-500 transition">
                −
            </button>

            <input type="number" name="qty" min="1" value="1"
                class="w-14 text-center rounded-md border border-purple-400 bg-purple-50 text-purple-800 font-semibold 
                       focus:outline-none focus:ring-2 focus:ring-purple-500">

            <button type="button" onclick="this.previousElementSibling.stepUp()" 
                class="bg-purple-600 text-white px-3 py-1 rounded-md hover:bg-purple-500 transition">
                +
            </button>
        </div>

        <button type="submit"
            class="w-full bg-purple-700 text-white py-2 rounded-lg hover:bg-purple-600 transition font-semibold">
            Tambah Keranjang
        </button>
    </form>
</div>
