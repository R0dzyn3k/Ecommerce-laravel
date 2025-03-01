@props(['title' => null, 'styles' => '', 'scripts' => ''])

  <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'E-sklep') . ($title ? (' - ' . $title) : '') }}</title>

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    {{ $styles }}
  </head>
  <body class="font-sans antialiased">
    {{ $slot }}

    {{ $scripts }}
  </body>
</html>
