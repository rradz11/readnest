<!DOCTYPE html>
<html>

<head>
  <title>Daftar Artikel</title>
  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body {
      font-family: 'Instrument Sans', sans-serif;
    }
  </style>
</head>

<body>
  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0 flex items-center justify-between">
        <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
          Mau baca apa hari ini, <span id="username"></span>?
        </h2>
      </div>
      <p class="mt-2 text-lg leading-8 text-gray-600">
        Jelajahi ide segar, sudut pandang bermakna, dan kisah yang menggerakkan masa depan.
      </p>
      <a href="/settings"
        class="text-sm text-black mt-6 rounded-full inline-block px-4 py-2 ring-1 ring-gray-300">Settings</a>
      <div
        class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @foreach ($articles as $article)
          <article class="flex max-w-xl flex-col items-start justify-between">
            <div class="group relative">
              <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href="{{ route('articles.show', $article->id) }}">
                  <span class="absolute inset-0"></span>
                  {{ $article->title }}
                </a>
              </h3>
              <p class="mt-2 line-clamp-3 text-sm leading-6 text-gray-600">
                {{ Str::limit($article->content, 100) }}
              </p>
            </div>
            <div class="mt-4 flex items-center gap-x-4 text-xs text-gray-500">
              <span>Kategori: {{ $article->category->name ?? 'Tidak ada' }}</span>
              <span>&bull;</span>
              <span>Penulis: {{ $article->author->user->username ?? '-' }}</span>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </div>

  <script>
    const token = localStorage.getItem('token');
    if (!token) {
      window.location.href = '/login';
    }

    async function fetchArticles() {
      try {
        const response = await fetch('/api/articles', {
          headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
          },
        });
        if (!response.ok) {
          throw new Error('Gagal mengambil artikel');
        }
        const articles = await response.json();
        const articlesList = document.getElementById('articles-list');
        articlesList.innerHTML = articles.data.map(article => `
            <div class="article">
                <h3>${article.title}</h3>
                <p>${article.content.substring(0, 100)}...</p>
                <div class="actions">
                    <a href="/articles/${article.id}" class="btn">Lihat</a>
                    ${userRole === 'writer' || userRole === 'admin' ? `<a href="/articles/${article.id}/edit" class="btn">Edit</a>` : ''}
                    ${userRole === 'admin' ? `<button class="btn delete-btn" data-id="${article.id}">Hapus</button>` : ''}
                </div>
            </div>
        `).join('');
      } catch (error) {
        document.getElementById('error-message').textContent = error.message;
      }
    }

    async function fetchUsername() {
      const token = localStorage.getItem('token');
      if (!token) return;

      try {
        const response = await fetch('/api/auth/me', {
          headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json',
          },
        });
        if (!response.ok) throw new Error('Gagal mengambil data user');

        const data = await response.json();
        console.log(data);
        const username = data.user.username;
        document.getElementById('username').textContent = username;
      } catch (error) {
        console.error(error);
      }
    }

    async function fetchUser() {
      try {
        const response = await fetch('/api/auth/me', {
          headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
          },
        });
        if (!response.ok) {
          throw new Error('Gagal mengambil data pengguna');
        }
        const user = await response.json();
        window.userRole = user.user.role.name;
        document.getElementById('user-role').textContent = `Role: ${userRole}`;
        if (userRole === 'writer' || userRole === 'admin') {
          document.getElementById('create-article').style.display = 'block';
        }
      } catch (error) {
        document.getElementById('error-message').textContent = error.message;
        window.location.href = '/login';
      }
    }

    async function deleteArticle(id) {
      if (!confirm('Yakin ingin menghapus artikel ini?')) return;
      try {
        const response = await fetch(`/api/articles/${id}`, {
          method: 'DELETE',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
          },
        });
        if (!response.ok) {
          throw new Error('Gagal menghapus artikel');
        }
        fetchArticles();
      } catch (error) {
        document.getElementById('error-message').textContent = error.message;
      }
    }

    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('delete-btn')) {
        const id = e.target.getAttribute('data-id');
        deleteArticle(id);
      }
    });

    fetchUser().then(fetchArticles);
    fetchUsername();
  </script>
</body>

</html>
