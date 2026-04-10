<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Sewa Bus - TransWisata</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">

<!-- <x-navbar></x-navbar> -->

    <header class="bg-blue-900 py-12">
        <div class="max-w-3xl mx-auto px-4 text-center text-white">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Formulir Pemesanan</h1>
            <p class="text-gray-300">Lengkapi detail perjalanan Anda di bawah ini dan tim kami akan segera menghubungi Anda.</p>
        </div>
    </header>

    <section class="py-12 px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-6 md:p-10">
            <form action="{{ url('/form/store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="space-y-6">
                        <h2 class="text-xl font-bold text-gray-800 border-b pb-2">Data Penyewa</h2>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="nama" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Contoh: Budi Santoso" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp</label>
                            <input type="tel" name="no_telepon" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="0812xxxxxx" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="anda@email.com">
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h2 class="text-xl font-bold text-gray-800 border-b pb-2">Detail Perjalanan</h2>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pilihan Armada</label>
                            <select name="unit_id" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">
                                <option value="" disabled selected>Pilih Armada</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->tipe }} - {{ $unit->model }} ({{ $unit->kapasitas }} Penumpang)</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Berangkat</label>
                                <input type="date" name="tanggal_berangkat" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Durasi (Hari)</label>
                                <input type="number" name="durasi" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="1" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan</label>
                            <input type="text" name="tujuan" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Contoh: Pantai Manggar Mall BSB Pasar Tumpah">
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan (Opsional)</label>
                    <textarea name="catatan" class="w-full border border-gray-300 rounded-lg p-3 h-32 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Tulis rute detail atau permintaan khusus di sini..."></textarea>
                </div>

                <div class="mt-8 text-right">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold text-lg transition shadow-lg w-full md:w-auto">
                        Kirim Permintaan Sewa
                    </button>
                </div>
            </form>
        </div>
    </section>

    <footer class="bg-gray-900 text-white pt-16 pb-8">
       <div class="text-center text-gray-500 text-sm">
           <p>&copy; 2024 TransWisata Transport Service.</p>
       </div>
    </footer>

</body>
</html>