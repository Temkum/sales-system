<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  @vite('resources/js/app.js', 'vendor/courier/build')
  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    nav {
      background: rgb(186, 205, 247);
    }

    .nav-items {
      display: flex;
      justify-content: space-evenly;
      width: 300px;
    }

    .p-3 {
      padding: 20px;
    }

    .ml-3 {
      margin-left: 10px;
    }
  </style>
</head>

<body class="antialiased">
  <div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
      <nav class="p-3">
        <div class="nav-items">
          @auth
            <a href="{{ route('admin.dashboard') }}" class="m-3">{{ __('Dashboard') }}</a>
          @else
            <a href="{{ route('login') }}" class="">{{ __('Log in') }}</a>

            @if (Route::has('register'))
              <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Register') }}</a>
            @endif
          @endauth
        </div>
      </nav>
    @endif

    <div class="text-center">
      <div class="container">
        <marquee behavior="" direction="">
          <h1>{{ __('Welcome to Pacho Designs') }}</h1>
        </marquee>
      </div>
    </div>
  </div>
</body>

</html>
