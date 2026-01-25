<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-2xl shadow-md w-96">
        <img src="{{asset('images/Logo_Depan.png')}}" alt="Masjid Al Haq" class="mx-auto mb-4 w-24">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login Admin</h2>
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm text-gray-600">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm text-gray-600">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded" placeholder="Masukkan Password" required>
            </div>
            <button class="w-full bg-amber-600 text-white p-2 rounded hover:bg-blue-700">Masuk</button>
        </form>
        <a href="/" class="block text-center mt-4 text-sm text-gray-500 hover:underline">Kembali ke Home</a>
    </div>
</body>
</html>