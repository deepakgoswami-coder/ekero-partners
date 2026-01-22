<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style type="text/tailwindcss">
    @theme {
      --color-clifford: #da373d;
    }
  </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/css/intlTelInput.css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.js"></script>


<!-- Favicons -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Petit+Formal+Script&display=swap" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

  <title>@yield('title', 'Ekero Partners Empower Wealth')</title>

  {{-- Meta slot for per-page tags --}}
  @yield('meta')


  {{-- Allow pages to push extra styles --}}
  @stack('styles')
</head>
<body>
  {{-- header/navbar --}}
  @include('website.layout.header')

  {{-- Main content area where pages render their content --}}
  <main class=" mx-auto">
    {{-- optional page heading --}}
    
    @hasSection('page_heading')
      <header class="mb-4">
        <h1 class="text-2xl font-bold">@yield('page_heading')</h1>
      </header>
    @endif



    @yield('content')



  </main>

  {{-- footer --}}
  @include('website.layout.footer')



  {{-- Shared scripts loaded after body --}}
  @stack('scripts')
 {{-- page-specific scripts (push from child views) --}}
 
</body>
</html>