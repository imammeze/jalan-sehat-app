<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/logo-sobat.png') }}" type="image/x-icon">
    <title>Daftar Jalan Sehat</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-xl">
        <img src="{{asset('images/Logo_Depan.png')}}" alt="Masjid Al Haq" class="mx-auto mb-4 w-32">
        <h2 class="text-2xl font-bold mb-6 text-center text-amber-600">Funwalk dan Peresmian Masjid Al Haq</h2>
        
        <form action="{{ route('ticket.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" placeholder="Contoh: Budi Santoso" >
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nomor WhatsApp</label>
                <input type="number" name="phone" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" placeholder="08123456789" >
            </div>

            <div class="g-recaptcha mb-5" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
            
            <button type="submit" class="w-full bg-amber-600 text-white font-bold py-2 px-4 rounded hover:bg-amber-700 transition">
                Daftar & Cetak Tiket
            </button>

            <p class="text-center mt-4 font-semibold">Powered by <a class="text-red-500" href="https://sobatberbagi.com">Sobatberbagi.com</a></p>
        </form>
    </div>

     @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Mendaftar',
                text: '{{ $errors->first() }}',
                confirmButtonText: 'Coba Lagi',
                confirmButtonColor: '#d33', 
                timer: 5000 
            });
        </script>
    @endif

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (!$errors->any())
            
            Swal.fire({
                title: '⚠️ PERHATIAN',
                text: 'Jika terindikasi data tidak valid (palsu/spam), maka status kepesertaan akan kami GUGURKAN secara otomatis.',
                icon: 'warning',
                confirmButtonText: 'Saya Mengerti & Setuju',
                confirmButtonColor: '#d33', 
                allowOutsideClick: false, 
                allowEscapeKey: false,
                backdrop: `
                    rgba(0,0,123,0.4)
                    left top
                    no-repeat
                `
            });

        @endif

    });
</script>
</body>
</html>