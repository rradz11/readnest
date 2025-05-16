<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome | {{ config('app.name', 'Readnest') }}</title>

  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body {
      font-family: 'Instrument Sans', sans-serif;
    }
  </style>
</head>

<body class="bg-white text-gray-800 antialiased">
  <div class="min-h-screen flex flex-col justify-center items-center px-6 sm:px-12 lg:px-20">
    <header class="text-center mb-12">
      <h1 class="text-4xl sm:text-5xl font-semibold text-gray-900 tracking-tight mb-4">
        Readnest - Menyatu dengan Kesempurnaan Digital
      </h1>
      <p class="text-gray-600 text-lg sm:text-xl max-w-2xl mx-auto">
        Lebih dari sekadar membaca. Readnest menghadirkan ruang yang indah dan intuitif untuk menikmati artikel terbaik,
        tanpa gangguan. Fokus pada konten. Rasakan pengalaman membaca yang benar-benar baru.
      </p>

    </header>

    <div class="flex space-x-4">
      <a href="{{ route('login') }}"
        class="px-6 py-3 rounded-xl bg-black text-white font-medium hover:bg-gray-800 transition">
        Masuk
      </a>
      <a href="{{ route('register') }}"
        class="px-6 py-3 rounded-xl bg-gray-100 text-gray-800 font-medium hover:bg-gray-200 transition">
        Daftar
      </a>
    </div>
  </div>

  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:text-center">
        <h2 class="text-base/7 font-semibold text-indigo-600">Readnest</h2>
        <p class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl lg:text-balance">
          Satu tempat untuk membaca, menulis, dan berbagi inspirasi
        </p>
        <p class="mt-6 text-lg/8 text-gray-600">
          Readnest adalah platform publikasi modern yang memudahkan Anda membuat dan mengelola artikel secara
          profesional. Dirancang dengan kecepatan, keamanan, dan kemudahan sebagai prioritas.
        </p>
      </div>

      <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
        <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">

          <div class="relative pl-16">
            <dt class="text-base/7 font-semibold text-gray-900">
              <div class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                <!-- Icon Upload -->
                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                </svg>
              </div>
              Unggah & Terbitkan Seketika
            </dt>
            <dd class="mt-2 text-base/7 text-gray-600">
              Buat artikel dan unggah hanya dalam beberapa klik. Semua konten langsung online dalam hitungan detik.
            </dd>
          </div>

          <div class="relative pl-16">
            <dt class="text-base/7 font-semibold text-gray-900">
              <div class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                <!-- Icon SSL -->
                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
              </div>
              Keamanan Terjamin
            </dt>
            <dd class="mt-2 text-base/7 text-gray-600">
              Semua data dilindungi dengan sertifikat SSL dan sistem autentikasi modern.
            </dd>
          </div>

          <div class="relative pl-16">
            <dt class="text-base/7 font-semibold text-gray-900">
              <div class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                <!-- Icon Sync -->
                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
              </div>
              Sinkronisasi Otomatis
            </dt>
            <dd class="mt-2 text-base/7 text-gray-600">
              Konten Anda selalu sinkron di semua perangkat. Tidak ada lagi kehilangan data atau versi tidak sesuai.
            </dd>
          </div>

          <div class="relative pl-16">
            <dt class="text-base/7 font-semibold text-gray-900">
              <div class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600">
                <!-- Icon Security -->
                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                </svg>
              </div>
              Perlindungan Cerdas
            </dt>
            <dd class="mt-2 text-base/7 text-gray-600">
              Sistem kami secara otomatis memantau aktivitas mencurigakan dan menjaga akun Anda tetap aman setiap saat.
            </dd>
          </div>

        </dl>
      </div>
    </div>
  </div>



  <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div
      class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,var(--color-indigo-100),white)] opacity-20">
    </div>
    <div
      class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl ring-1 shadow-indigo-600/10 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center">
    </div>
    <div class="mx-auto max-w-2xl lg:max-w-4xl">
      <h2 class="text-lg text-center font-bold tracking-tight text-gray-900">Readnest</h2>
      <figure class="mt-10">
        <blockquote class="text-center text-xl/8 font-semibold text-gray-900 sm:text-2xl/9">
          <p class="text-center text-xl/8 font-semibold text-gray-900 sm:text-2xl/9">
            “Satu aplikasi, banyak kemungkinan — solusi inovatif untuk tantangan sehari-hari Anda.”
          </p>
        </blockquote>
        <figcaption class="mt-10">
          {{-- <div class="flex ">
            <img class="mx-auto size-10 rounded-full"
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt="">
            <img class="mx-auto size-10 rounded-full"
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt="">
            <img class="mx-auto size-10 rounded-full"
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt="">
          </div> --}}
          <div class="mt-6 flex items-center justify-center space-x-3 text-base">
            <div class="font-semibold text-gray-900">Kelompok 7</div>
            <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
              <circle cx="1" cy="1" r="1" />
            </svg>
            <div class="text-gray-600">2023C</div>
          </div>
        </figcaption>
      </figure>
    </div>
  </section>
</body>

</html>
