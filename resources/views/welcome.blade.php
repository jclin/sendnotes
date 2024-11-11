<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <wireui:scripts />
</head>

<body class="font-sans antialiased">
  <div
    class="bg-dots-darker dark:bg-dots-lighter relative min-h-screen bg-gray-100 bg-center selection:bg-red-500 selection:text-white dark:bg-gray-900 sm:flex sm:items-center sm:justify-center">
    @if (Route::has('login'))
      <livewire:welcome.navigation />
    @endif
    <div class="mx-auto flex max-w-7xl flex-col items-center justify-center space-y-4 p-6 text-center lg:p-8">
      <x-application-logo class="text-primary h-24 w-24 fill-current" />
      <x-wireui-button primary xl href="{{ route('register') }}">Get Started</x-wireui-button>
    </div>
  </div>
</body>

</html>
