<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body {
      font-family: 'Instrument Sans', sans-serif;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div class="w-full max-w-md bg-white rounded-2xl p-8 space-y-6 shadow-lg">
    <div class="text-center">
      <h2 class="text-3xl font-extrabold">Selamat Datang</h2>
      <p class="mt-2 text-sm text-gray-500">Silahkan masuk untuk melanjutkan</p>
    </div>

    <form id="login-form" class="space-y-5" novalidate>
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
        <input type="password" name="password" id="password" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
      </div>

      <button type="submit"
        class="w-full bg-black text-white font-semibold py-2 rounded-lg shadow-sm transition duration-200">
        Masuk
      </button>
    </form>

    <div id="error-message" class="text-red-600 text-sm text-center font-medium"></div>

    <div class="text-center text-sm text-gray-500">
      Belum punya akun?
      <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-medium">Daftar</a>
    </div>
  </div>

  <script>
    document.getElementById('login-form').addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(e.target);
      const data = Object.fromEntries(formData);
      const errorMessage = document.getElementById('error-message');
      errorMessage.textContent = ''; // reset pesan error

      try {
        const response = await fetch('/api/auth/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
          },
          body: JSON.stringify(data),
        });

        const result = await response.json();

        if (response.ok) {
          localStorage.setItem('token', result.token);
          window.location.href = '/articles';
        } else {
          if (result.message === 'Email belum terdaftar') {
            errorMessage.textContent = 'Email belum terdaftar. Silakan daftar terlebih dahulu.';
          } else if (result.message === 'Kata sandi salah') {
            errorMessage.textContent = 'Kata sandi salah. Silakan coba lagi.';
          } else {
            errorMessage.textContent = 'Login gagal. Periksa email dan kata sandi Anda.';
          }
        }
      } catch (err) {
        errorMessage.textContent = 'Terjadi kesalahan: ' + err.message;
      }
    });
  </script>

</body>

</html>
