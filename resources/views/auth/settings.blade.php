<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan Akun</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  <style>
    body {
      font-family: 'Instrument Sans', sans-serif;
    }

    .toast {
      animation: slideIn 0.3s ease-out, fadeOut 0.3s ease-in 2.7s forwards;
    }

    @keyframes slideIn {
      from {
        transform: translateY(-20px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes fadeOut {
      to {
        opacity: 0;
      }
    }
  </style>
</head>

<body class="min-h-screen bg-gray-100 font-sans antialiased">
  <!-- Sidebar Navigation -->
  <div class="flex min-h-screen">
    <aside class="bg-white w-64 shadow-lg hidden md:block">
      <div class="p-6">
        <a href="{{ route('articles.index') }}" class="text-2xl font-bold text-gray-900">Readnest</a>
      </div>
      <nav class="mt-6">
        <a href="{{ route('articles.index') }}"
          class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
          </svg>
          Daftar Artikel
        </a>
        <a href="{{ route('settings') }}" class="flex items-center px-6 py-3 bg-gray-100 text-gray-900 font-semibold">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37zM15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
          </svg>
          Pengaturan Akun
        </a>
        <button id="logout-btn"
          class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition w-full text-left">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
          </svg>
          Logout
        </button>
      </nav>
    </aside>

    <!-- Mobile Sidebar Toggle -->
    <div class="md:hidden fixed top-0 left-0 w-full bg-white shadow-sm p-4 flex justify-between items-center z-10">
      <a href="{{ route('articles.index') }}" class="text-xl font-bold text-gray-900">Readnest</a>
      <button id="sidebar-toggle" class="text-gray-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
    <div id="mobile-sidebar"
      class="md:hidden fixed top-0 left-0 w-64 h-full bg-white shadow-lg transform -translate-x-full transition-transform z-20">
      <div class="p-6 flex justify-between items-center">
        <a href="{{ route('articles.index') }}" class="text-2xl font-bold text-gray-900">Readnest</a>
        <button id="sidebar-close" class="text-gray-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <nav class="mt-6">
        <a href="{{ route('articles.index') }}"
          class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
          </svg>
          Daftar Artikel
        </a>
        <a href="{{ route('settings') }}" class="flex items-center px-6 py-3 bg-gray-100 text-gray-900 font-semibold">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37zM15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
          </svg>
          Pengaturan Akun
        </a>
        <button id="logout-btn"
          class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition w-full text-left">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
          </svg>
          Logout
        </button>
      </nav>
    </div>

    <!-- Main Content -->
    <main class="flex-1 p-6 md:p-10">
      <!-- Page Title -->
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center animate-fade-in">Pengaturan Akun</h1>

      <!-- Informasi Akun -->
      <section class="bg-white rounded-2xl shadow-sm p-8 mb-8 animate-fade-in">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Informasi Akun</h2>
        <div id="user-loading" class="flex justify-center py-4">
          <svg class="animate-spin h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
          </svg>
        </div>
        <div id="user-info" class="space-y-4">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span class="font-medium text-gray-700">Username:</span> <span id="info-username"
              class="text-gray-900"></span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l9-6 9 6v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"></path>
            </svg>
            <span class="font-medium text-gray-700">Email:</span> <span id="info-email" class="text-gray-900"></span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium text-gray-700">Role:</span> <span id="info-role" class="text-gray-900"></span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium text-gray-700">Bergabung Sejak:</span> <span id="info-created"
              class="text-gray-900"></span>
          </div>
        </div>
      </section>

      <!-- Ubah Password -->
      <section class="bg-white rounded-2xl shadow-sm p-8 mb-8 animate-fade-in">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Ubah Password</h2>
        <form id="change-password-form" class="space-y-6">
          <div>
            <label for="old_password" class="block text-sm font-medium text-gray-700">Password Lama</label>
            <input type="password" id="old_password" placeholder="Masukkan password lama"
              class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
              required>
          </div>
          <div>
            <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
            <input type="password" id="new_password" placeholder="Masukkan password baru"
              class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
              required>
            <div id="password-strength" class="mt-2 text-sm"></div>
          </div>
          <div>
            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" id="confirm_password" placeholder="Konfirmasi password baru"
              class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
              required>
          </div>
          <button type="submit"
            class="w-full inline-flex justify-center items-center px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition disabled:opacity-50"
            disabled>
            <svg class="w-5 h-5 mr-2 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9"></path>
            </svg>
            Simpan Perubahan
          </button>
        </form>
      </section>

      <!-- Hapus Akun -->
      <section class="bg-white rounded-2xl shadow-sm p-8 mb-8 animate-fade-in">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Hapus Akun</h2>
        <p class="text-sm text-gray-600 mb-4">Menghapus akun akan menghapus semua data Anda secara permanen. Tindakan
          ini tidak dapat dibatalkan. Masukkan password Anda untuk mengonfirmasi.</p>
        <form id="delete-account-form" class="space-y-6">
          <div>
            <label for="delete_password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="delete_password" placeholder="Masukkan password Anda"
              class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 transition"
              required>
          </div>
          <button type="submit"
            class="w-full inline-flex justify-center items-center px-6 py-3 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition">
            <svg class="w-5 h-5 mr-2 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9"></path>
            </svg>
            Hapus Akun
          </button>
        </form>
      </section>
    </main>
  </div>

  <!-- Toast Notification -->
  <div id="toast" class="fixed top-4 right-4 max-w-xs w-full bg-white rounded-lg shadow-lg p-4 hidden">
    <div class="flex items-center">
      <svg id="toast-icon" class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
      </svg>
      <p id="toast-message" class="text-sm text-gray-900"></p>
    </div>
  </div>

  <script>
    const token = localStorage.getItem('token');
    if (!token) window.location.href = '/login';

    function showToast(message, type = 'success') {
      const toast = document.getElementById('toast');
      const toastMessage = document.getElementById('toast-message');
      const toastIcon = document.getElementById('toast-icon');
      toastMessage.textContent = message;
      toast.classList.remove('hidden', 'bg-red-50', 'bg-green-50');
      toastIcon.classList.remove('text-red-500', 'text-green-500');
      if (type === 'success') {
        toast.classList.add('bg-green-50');
        toastIcon.classList.add('text-green-500');
      } else {
        toast.classList.add('bg-red-50');
        toastIcon.classList.add('text-red-500');
      }
      setTimeout(() => toast.classList.add('hidden'), 3000);
    }

    async function loadUserData() {
      const loading = document.getElementById('user-loading');
      const userInfo = document.getElementById('user-info');
      loading.classList.remove('hidden');
      try {
        const cachedUser = localStorage.getItem('user_data');
        if (cachedUser) {
          const user = JSON.parse(cachedUser);
          document.getElementById('info-username').textContent = user.username;
          document.getElementById('info-email').textContent = user.email;
          document.getElementById('info-role').textContent = user.role.name;
          document.getElementById('info-created').textContent = new Date(user.created_at).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
          });
          loading.classList.add('hidden');
          return;
        }

        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), 5000);
        const res = await fetch('/api/auth/me', {
          headers: {
            Authorization: `Bearer ${token}`,
            Accept: 'application/json',
          },
          signal: controller.signal,
        });
        clearTimeout(timeoutId);
        const {
          user
        } = await res.json();
        if (!res.ok) throw new Error(user.message || 'Gagal memuat data pengguna');

        localStorage.setItem('user_data', JSON.stringify(user));
        document.getElementById('info-username').textContent = user.username;
        document.getElementById('info-email').textContent = user.email;
        document.getElementById('info-role').textContent = user.role.name;
        document.getElementById('info-created').textContent = new Date(user.created_at).toLocaleDateString('id-ID', {
          day: 'numeric',
          month: 'long',
          year: 'numeric',
        });
        loading.classList.add('hidden');
      } catch (err) {
        showToast('Gagal memuat data pengguna. Silakan coba lagi.', 'error');
        loading.classList.add('hidden');
      }
    }

    function checkPasswordStrength(password) {
      const strengthDiv = document.getElementById('password-strength');
      if (!password) {
        strengthDiv.textContent = '';
        return;
      }
      const strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      const mediumRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$/;
      if (strongRegex.test(password)) {
        strengthDiv.textContent = 'Kuat';
        strengthDiv.className = 'mt-2 text-sm text-green-500';
      } else if (mediumRegex.test(password)) {
        strengthDiv.textContent = 'Sedang';
        strengthDiv.className = 'mt-2 text-sm text-yellow-500';
      } else {
        strengthDiv.textContent = 'Lemah';
        strengthDiv.className = 'mt-2 text-sm text-red-500';
      }
    }

    document.getElementById('change-password-form').addEventListener('submit', async (e) => {
      e.preventDefault();
      const oldPassword = document.getElementById('old_password').value;
      const newPassword = document.getElementById('new_password').value;
      const confirmPassword = document.getElementById('confirm_password').value;
      const submitBtn = e.target.querySelector('button[type="submit"]');
      const submitIcon = submitBtn.querySelector('svg');

      if (newPassword !== confirmPassword) {
        showToast('Password baru dan konfirmasi tidak cocok.', 'error');
        return;
      }

      submitBtn.disabled = true;
      submitIcon.classList.remove('hidden');
      try {
        const res = await fetch('/api/auth/change-password', {
          method: 'POST',
          headers: {
            Authorization: `Bearer ${token}`,
            'Content-Type': 'application/json',
            Accept: 'application/json',
          },
          body: JSON.stringify({
            old_password: oldPassword,
            new_password: newPassword
          }),
        });
        const result = await res.json();
        if (!res.ok) throw new Error(result.message || 'Gagal mengubah password.');

        showToast('Password berhasil diubah.', 'success');
        document.getElementById('change-password-form').reset();
        document.getElementById('password-strength').textContent = '';
      } catch (err) {
        showToast(err.message, 'error');
      } finally {
        submitBtn.disabled = false;
        submitIcon.classList.add('hidden');
      }
    });

    document.getElementById('logout-btn').addEventListener('click', async () => {
      try {
        await fetch('/api/auth/logout', {
          method: 'POST',
          headers: {
            Authorization: `Bearer ${token}`,
            Accept: 'application/json',
          },
        });
        localStorage.removeItem('token');
        localStorage.removeItem('user_data');
        window.location.href = '/login';
      } catch (error) {
        showToast('Gagal logout. Silakan coba lagi.', 'error');
      }
    });

    document.getElementById('delete-account-form').addEventListener('submit', async (e) => {
      e.preventDefault();
      if (!confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.')) return;

      const password = document.getElementById('delete_password').value;
      const submitBtn = e.target.querySelector('button[type="submit"]');
      const submitIcon = submitBtn.querySelector('svg');

      submitBtn.disabled = true;
      submitIcon.classList.remove('hidden');
      try {
        const res = await fetch('/api/auth/delete-account', {
          method: 'POST',
          headers: {
            Authorization: `Bearer ${token}`,
            'Content-Type': 'application/json',
            Accept: 'application/json',
          },
          body: JSON.stringify({
            password
          }),
        });
        const result = await res.json();
        if (!res.ok) throw new Error(result.message || 'Gagal menghapus akun.');

        localStorage.removeItem('token');
        localStorage.removeItem('user_data');
        showToast('Akun berhasil dihapus.', 'success');
        setTimeout(() => (window.location.href = '/login'), 1000);
      } catch (err) {
        showToast(err.message, 'error');
      } finally {
        submitBtn.disabled = false;
        submitIcon.classList.add('hidden');
      }
    });

    // Password strength and submit button enable/disable
    const newPasswordInput = document.getElementById('new_password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const submitBtn = document.querySelector('#change-password-form button[type="submit"]');

    function updateSubmitButton() {
      submitBtn.disabled = !newPasswordInput.value || newPasswordInput.value !== confirmPasswordInput.value;
    }
    newPasswordInput.addEventListener('input', () => {
      checkPasswordStrength(newPasswordInput.value);
      updateSubmitButton();
    });
    confirmPasswordInput.addEventListener('input', updateSubmitButton);

    // Mobile sidebar toggle
    document.getElementById('sidebar-toggle').addEventListener('click', () => {
      document.getElementById('mobile-sidebar').classList.remove('-translate-x-full');
    });
    document.getElementById('sidebar-close').addEventListener('click', () => {
      document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
    });

    loadUserData();
  </script>
</body>

</html>
