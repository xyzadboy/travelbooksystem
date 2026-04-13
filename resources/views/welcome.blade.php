<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>TransWisata | Sewa Bus Pariwisata Terbaik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">

<x-navbar></x-navbar>

    <header class="relative h-[80vh] flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover" alt="Bus Pariwisata">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-white">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 leading-tight">
                Jelajahi Keindahan Nusantara <br> <span class="text-orange-400">Dengan Kenyamanan Eksekutif</span>
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-2xl text-gray-200">
                Penyedia layanan bus pariwisata premium untuk perjalanan keluarga, studi tour, hingga kunjungan kerja. Aman, Nyaman, dan Terpercaya.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#armada" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold text-lg transition">Lihat Armada</a>
                <!-- <a href="#" class="bg-white hover:bg-gray-100 text-blue-900 px-8 py-3 rounded-lg font-bold text-lg transition">Cek Promo</a> -->
            </div>
        </div>
    </header>

    <section id="layanan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12">Mengapa Memilih Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Keamanan Terjamin</h3>
                    <p class="text-gray-600">Armada kami selalu dalam kondisi prima dengan perawatan rutin dan driver berpengalaman.</p>
                </div>
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-couch text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fasilitas Lengkap</h3>
                    <p class="text-gray-600">Dilengkapi AC, TV, Karaoke, Wi-Fi, dan Port USB untuk menjaga kenyamanan perjalanan Anda.</p>
                </div>
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-tags text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Harga Kompetitif</h3>
                    <p class="text-gray-600">Dapatkan penawaran harga terbaik dengan kualitas layanan bus bintang lima.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="armada" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Pilihan Armada Kami</h2>
                    <p class="text-gray-600 mt-2">Pilih kendaraan yang sesuai dengan kapasitas rombongan Anda</p>
                </div>
            </div>


    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">

    @foreach($units as $unit)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

            {{-- Gambar --}}
            <img src="{{ asset('storage/'.$unit->cover) }}"
                 class="w-full h-80 object-cover">

            <div class="p-6">
                {{-- Tipe --}}
                <h2 class="text-2xl font-bold mb-1">
                    {{ $unit->tipe }}
                </h2>

                {{-- Model --}}
                <p class="text-gray-500 mb-3">
                    {{ $unit->model }}
                </p>

                {{-- Kapasitas --}}
                <p class="font-semibold text-lg">
                    Kapasitas: {{ $unit->kapasitas }} Seats
                </p>

                {{-- Tombol Detail --}}
                <a href="/detail/{{ $unit->id }}"
                   class="inline-block mt-5 bg-blue-600 hover:bg-blue-700 transition text-white px-5 py-2 rounded-xl">
                    Lihat Detail
                </a>
            </div>

        </div>
    @endforeach

</div>

</div>
            
        </div>
    </section>

<x-footer></x-footer>

</body>
</html>