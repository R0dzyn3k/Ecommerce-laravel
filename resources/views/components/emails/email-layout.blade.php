<!doctype html>
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
      .body {
        background-color: #f9f9f9;
        color: #000;
        font-family: "Open Sans", sans-serif;
      }

      table {
        border-collapse: collapse;
        width: 100%;
      }

      table thead th {
        background-color: #ededed;
      }

      table .right {
        text-align: right;
      }

      table .center {
        text-align: center;
      }

      .email-wrapper {
        width: 100%;
        max-width: 800px;
        margin: 40px auto;
        padding: 12px;
        box-sizing: border-box;
        border-radius: 5px;
        background-color: #fff;
      }
    </style>

    @stack('styles')
  </head>
  <body class="body">
    @isset($content)
      <div class="email-wrapper">
        {{ $content }}
      </div>
    @endisset
  </body>
</html>
