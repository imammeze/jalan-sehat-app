<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/logo-sobat.png') }}" type="image/x-icon">
    <title>Pendaftaran Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.onload = function() {
            setTimeout(function() {
                window.location.href = "{{ route('ticket.download', $participant->phone) }}";
            }, 1000);
        };
    </script>
</head>
<body class="bg-green-50 flex items-center justify-center h-screen">
    <div class="bg-white p-10 rounded-xl shadow-xl w-full max-w-lg text-center border-t-8 border-green-500">
        
        <div class="mb-6">
            <svg class="w-20 h-20 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>

        <h2 class="text-3xl font-bold mb-2 text-gray-800">Pendaftaran Berhasil!</h2>
        <p class="text-gray-600 mb-2">Terima kasih <strong>{{ $participant->name }}</strong>.</p>
        <p class="font-bold text-2xl mb-6">{{ $participant->ticket_number }}</p>
        
        <div class="bg-green-100 p-4 rounded-lg mb-6 text-sm text-green-800">
            Tiket Anda sedang didownload secara otomatis...
        </div>

        <p class="text-gray-500 text-sm mb-4">Jika download tidak berjalan otomatis, silakan klik tombol di bawah:</p>
        
        <a href="{{ route('ticket.download', $participant->phone) }}" class="inline-block bg-green-600 text-white font-bold py-3 px-6 rounded-full hover:bg-green-700 transition shadow-lg mb-6">
            Download Tiket Manual
        </a>

        <div class="bg-blue-50 p-6 rounded-xl border border-blue-100">
            <h3 class="text-lg font-bold text-blue-800 mb-2">Mari Beramal Jariyah</h3>
            <p class="text-sm text-blue-600 mb-4">Sisihkan sebagian rezeki untuk <strong>Masjid Al Haq</strong>.</p>
            
            <a href="https://sobatberbagi.com/infaq/masjid-al-haq" target="_blank" 
               class="inline-block w-max bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition shadow-lg transform hover:-translate-y-1">
                ❤️ Infaq Sekarang
            </a>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-600 text-sm">Kembali ke Halaman Depan</a>
        </div>
    </div>
</body>
</html>