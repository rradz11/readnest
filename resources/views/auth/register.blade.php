<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-2xl w-full max-w-md space-y-6">
    <div class="text-center">
      <h2 class="text-3xl font-extrabold text-indigo-600">Buat Akun</h2>
      <p class="mt-2 text-sm text-gray-500">Daftar dan mulai menjelajahi</p>
    </div>

    <form id="register-form" class="space-y-5">
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
        <input type="text" name="username" id="username" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
      </div>

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

      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
      </div>

      <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg shadow-sm transition duration-200">
        Daftar
      </button>
    </form>

    <div class="text-center text-sm text-gray-500">
      Sudah punya akun?
      <a href="/login" class="text-indigo-600 hover:underline font-medium">Masuk di sini</a>
    </div>
  </div>

  <script>
    document.getElementById('register-form').addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(e.target);
      const data = Object.fromEntries(formData);

      try {
        const response = await fetch('/api/auth/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
          },
          body: JSON.stringify(data),
        });

        const result = await response.json();
        if (response.ok) {
          window.location.href = '/login';
        } else {
          alert('Gagal: ' + (result.message || 'Pendaftaran gagal'));
        }
      } catch (err) {
        alert('Terjadi kesalahan: ' + err.message);
      }
    });
  </script>
</body>

</html>
