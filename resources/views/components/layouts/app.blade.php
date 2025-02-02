@props(['title' => null])

  <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'E-sklep') . ($title ? (' - ' . $title) : '') }}</title>

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
  </head>
  <body class="font-sans antialiased">
    {{ $slot }}
  </body>
</html>
