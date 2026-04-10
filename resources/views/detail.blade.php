<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>TransWisata | Detail Armada</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 font-sans">

<x-navbar></x-navbar>

<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4">

        {{-- Judul --}}
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-gray-800">
                {{ $details->tipe }}
            </h1>
            <p class="text-gray-500 text-lg mt-2">
                Model: {{ $details->model }}
            </p>
        </div>

        {{-- ===================== CAROUSEL ===================== --}}

      @if($details->gambar && count($details->gambar) > 0)
<div x-data="{ active: 0 }" class="relative w-full mb-12">

    {{-- Gambar Utama --}}
    <div class="overflow-hidden rounded-2xl shadow-lg bg-gray-100">
        <img 
            x-bind:src="[
                @foreach($details->gambar as $img)
                    '{{ asset('storage/' . rawurlencode($img)) }}',
                @endforeach
            ][active]"
            class="w-full h-96 object-cover transition duration-500"
        >
    </div>

    {{-- Tombol Prev --}}
    <button 
        @click="active = (active - 1 + {{ count($details->gambar) }}) % {{ count($details->gambar) }}"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-3 rounded-full shadow"
    >
        <i class="fas fa-chevron-left"></i>
    </button>

    {{-- Tombol Next --}}
    <button 
        @click="active = (active + 1) % {{ count($details->gambar) }}"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-3 rounded-full shadow"
    >
        <i class="fas fa-chevron-right"></i>
    </button>

</div>
@endif
        {{-- ===================== END CAROUSEL ===================== --}}

        {{-- Informasi Detail --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            {{-- Detail Armada --}}
            <div>
                <h3 class="text-2xl font-semibold mb-6 text-gray-800">
                    Detail Armada
                </h3>

                <p class="mb-3 text-gray-700">
                    <span class="font-medium">Kapasitas:</span>
                    {{ $details->kapasitas }} Penumpang
                </p>
            </div>

            {{-- Fasilitas --}}
            <div>
                <h3 class="text-2xl font-semibold mb-6 text-gray-800">
                    Fasilitas
                </h3>

                @if($details->fasilitas && count($details->fasilitas) > 0)
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        @foreach($details->fasilitas as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Tidak ada fasilitas tersedia.</p>
                @endif
            </div>
<br>
        </div>
                {{-- BUTTON PESAN --}}
<a href="/form" class="btn btn-lg w-100 text-white fw-bold"
   style="
        background: linear-gradient(135deg, #0d3b66, #1a5f9e);
        border: none;
        padding: 14px;
        border-radius: 12px;
        transition: all 0.3s ease;
   "
   onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.2)'"
   onmouseout="this.style.transform='none'; this.style.boxShadow='none'">

    🚍 Pesan Sekarang
</a>
    </div>
</section>

<x-footer></x-footer>

{{-- ===================== SCRIPT CAROUSEL ===================== --}}
<script>
function carousel() {
    return {
        active: 0,
        images: [],
        init(rawImages) {
            this.images = rawImages.map(img => {
                return "{{ asset('storage') }}/" + encodeURIComponent(img);
            });
        },
        next() {
            this.active = (this.active + 1) % this.images.length;
        },
        prev() {
            this.active = (this.active - 1 + this.images.length) % this.images.length;
        }
    }
}
</script>
{{-- ===================== END SCRIPT ===================== --}}

</body>
</html>