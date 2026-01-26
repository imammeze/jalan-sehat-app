<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sudah Terdaftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-lg text-center border-t-8 border-orange-500">
        
        <div class="mb-6">
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-orange-100">
                <svg class="h-10 w-10 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <h2 class="text-2xl font-bold mb-2 text-gray-800">Halo, {{ $participant->name }}!</h2>
        <p class="text-orange-600 font-semibold text-lg mb-6">Data Anda Sudah Terdaftar Sebelumnya.</p>
        
        <div class="bg-gray-100 p-6 rounded-lg mb-6 border border-gray-200">
            <p class="text-sm text-gray-500 uppercase tracking-wide">Nomor Tiket Anda</p>
            <div class="text-4xl font-extrabold text-gray-800 mt-2 tracking-widest">
                {{ $participant->ticket_number }}
            </div>
            <p class="text-xs text-gray-400 mt-2">Nomor HP: {{ $participant->phone }}</p>
        </div>

        <p class="text-gray-600 mb-4 text-sm">Anda tidak perlu mendaftar ulang. Silakan download tiket Anda di bawah ini:</p>

        <a href="{{ route('ticket.download', $participant->phone) }}" class="inline-block w-full bg-gray-800 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-900 transition shadow mb-4 flex justify-center items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            Download Tiket Kembali
        </a>

        <a href="https://sobatberbagi.com/infaq/masjid-al-haq" target="_blank" 
           class="inline-block w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition shadow transform hover:-translate-y-1">
            ❤️ Infaq Masjid Al Haq
        </a>

        <div class="mt-8">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-600 text-sm underline">Kembali ke Halaman Depan</a>
        </div>
    </div>
</body>
</html>