<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikel - {{ $article->title }}</title>
  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body {
      font-family: 'Instrument Sans', sans-serif;
    }
  </style>
</head>

<body class="min-h-screen font-sans antialiased">
  <div class="container mx-auto max-w-4xl px-6 py-10">

    <article class=" rounded-2xl p-8 mb-4">
      <header class="mb-6">
        <h2 class="text-3xl font-bold text-gray-900">{{ $article->title }}</h2>
        <div class="flex items-center gap-4 text-sm mt-2">
          <p>Oleh: <span class="font-medium text-gray-700">{{ $article->author->user->username ?? 'Anomali' }}</span>
          </p>
          <p>Kategori: <span class="font-medium text-gray-700">{{ $article->category->name ?? 'Tanpa kategori' }}</span>
          </p>
        </div>
      </header>
      <section class="text-gray-800 text-lg leading-relaxed mb-6">
        {!! nl2br(e($article->content)) !!}
      </section>
    </article>

    <div id="article-actions" class="flex gap-4 mb-4"></div>

    <div id="comments-section" class="rounded-2xl p-8">
      <h3 class="text-2xl font-semibold text-gray-900 mb-4">Komentar</h3>
      <div id="comments-list" class="divide-y divide-gray-200"></div>
    </div>

    <div class="rounded-2xl p-8">
      <form id="comment-form">
        <textarea id="comment-content"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          rows="3" placeholder="Tulis komentar..."></textarea>
        <button type="submit"
          class="text-sm mt-3 px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
          Kirim Komentar
        </button>
      </form>

    </div>

    <div id="error-message" class="text-red-500 mt-6 text-center"></div>
  </div>

  <script>
    const token = localStorage.getItem('token');
    if (!token) window.location.href = '/login';
    const articleId = '{{ $article->id }}';

    function formatDate(isoString) {
      const date = new Date(isoString);
      return date.toLocaleString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
      });
    }


    async function fetchUser() {
      try {
        const response = await fetch('/api/auth/me', {
          headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
          },
        });
        const user = await response.json();
        if (!response.ok) throw new Error(user.message || 'Gagal mengambil data pengguna');

        const role = user.user.role.name;
        window.userRole = role;

        const actions = document.getElementById('article-actions');
        let buttons = '';

        if (['writer', 'admin'].includes(role)) {
          buttons += `
            <a href="/articles/${articleId}/edit"
              class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
              ✏️ Edit Artikel
            </a>`;
        }

        if (role === 'admin') {
          buttons += `
            <button class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition delete-btn"
                    data-id="${articleId}">
              🗑️ Hapus Artikel
            </button>`;
        }

        actions.innerHTML = buttons;
      } catch (error) {
        document.getElementById('error-message').textContent = error.message;
        window.location.href = '/login';
      }
    }

    async function fetchComments() {
      try {
        const response = await fetch(`/api/articles/${articleId}/comments`, {
          headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
          },
        });

        const comments = await response.json();
        console.log('Komentar respons:', comments);

        if (!Array.isArray(comments)) {
          throw new Error('Format data komentar tidak valid');
        }

        const container = document.getElementById('comments-list');
        container.innerHTML = comments.length ?
          comments.map(comment => `
          <div class="py-4 border-b border-gray-200">
            <p class="text-gray-700 text-base">${comment.content}</p>
            <p class="text-xs text-gray-500 mt-1">
                 ${comment.user?.username || 'Anonim'} - ${formatDate(comment.created_at)}
            </p>
          </div>
        `).join('') :
          '<p class="text-gray-500">Belum ada komentar.</p>';
      } catch (error) {
        console.error('Error fetchComments:', error);
        document.getElementById('error-message').textContent = error.message;
      }
    }

    document.getElementById('comment-form').addEventListener('submit', async function(e) {
      e.preventDefault();

      const content = document.getElementById('comment-content').value.trim();
      if (!content) return alert('Komentar tidak boleh kosong.');

      try {
        const response = await fetch(`/api/articles/${articleId}/comments`, {
          method: 'POST',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json',
          },
          body: JSON.stringify({
            content
          }),
        });

        const result = await response.json();

        if (!response.ok) {
          throw new Error(result.message || 'Gagal mengirim komentar');
        }

        document.getElementById('comment-content').value = '';
        fetchComments();
      } catch (error) {
        document.getElementById('error-message').textContent = error.message;
      }
    });



    async function deleteArticle(id) {
      if (!confirm('Yakin ingin menghapus artikel ini?')) return;
      try {
        const response = await fetch(`/api/articles/${id}`, {
          method: 'DELETE',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
          },
        });
        if (!response.ok) {
          const result = await response.json();
          throw new Error(result.message || 'Gagal menghapus artikel');
        }
        window.location.href = '/articles';
      } catch (error) {
        document.getElementById('error-message').textContent = error.message;
      }
    }

    document.addEventListener('click', e => {
      if (e.target.classList.contains('delete-btn')) {
        deleteArticle(e.target.dataset.id);
      }
    });

    fetchUser().then(fetchComments);
  </script>
</body>

</html>
