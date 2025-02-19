<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Outlook compatibility -->
    <!--[if gte mso 9]>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

    <!-- Font settings for Outlook -->
    <!--[if mso]>
    <style>
      * {
        font-family: sans-serif !important;
      }
    </style>
    <![endif]-->

    <!-- Base CSS Reset -->
    <style>
      :root {
        color-scheme: light dark;
        supported-color-schemes: light dark;
      }

      html, body {
        margin: 0 auto !important;
        padding: 0 !important;
        height: 100% !important;
        width: 100% !important;
        background-color: #222222;
      }

      * {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }

      div[style*="margin: 16px 0"] {
        margin: 0 !important;
      }

      table, td {
        mso-table-lspace: 0pt !important;
        mso-table-rspace: 0pt !important;
      }

      table {
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        table-layout: fixed !important;
        margin: 0 auto !important;
      }

      img {
        -ms-interpolation-mode: bicubic;
      }

      a {
        text-decoration: none;
      }

      @media (prefers-color-scheme: dark) {
        .email-bg {
          background: #111111 !important;
        }

        .darkmode-bg {
          background: #222222 !important;
        }

        h1, h2, h3, p, li, .darkmode-text, .email-container a:not([class]) {
          color: #F7F7F9 !important;
        }

        td.button-td-primary, td.button-td-primary a {
          background: #ffffff !important;
          border-color: #ffffff !important;
          color: #222222 !important;
        }

        .footer td {
          color: #aaaaaa !important;
        }

        .darkmode-fullbleed-bg {
          background-color: #0F3016 !important;
        }
      }
    </style>

    @stack('styles')
  </head>
  <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;" class="email-bg">
    <center role="article" aria-roledescription="email" lang="en" style="width: 100%; background-color: #222222;" class="email-bg">
      <!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #222222;" class="email-bg">
        <tr>
          <td>
      <![endif]-->

      <!-- Preview Text Spacing Hack : BEGIN -->
      <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
      </div>
      <!-- Preview Text Spacing Hack : END -->

      <div style="max-width: 600px; margin: 0 auto;" class="email-container">
        <!--[if mso]>
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600">
          <tr>
            <td>
        <![endif]-->

        <!-- Email Body : BEGIN -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
          <!-- Email Header : BEGIN -->
          <tr>
            <td style="padding: 20px 0; text-align: center">
              <a href="{{ config('app.url') }}">
                  <h1 style="">{{ config('app.name') }}</h1>
              </a>
            </td>
          </tr>
          <!-- Email Header : END -->

          {{ $slot }}

          <!-- Email Footer : BEGIN -->
          <tr>
            <td style="padding: 20px; font-family: sans-serif; font-size: 12px; text-align: center; color: #ffffff;" class="footer">
              <span>© {{ date('Y') }} {{ config('app.name') }}. Wszelkie prawa zastrzeżone.</span>
            </td>
          </tr>
          <!-- Email Footer : END -->
        </table>
        <!-- Email Body : END -->

        <!--[if mso]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </div>
      <!--[if mso | IE]>
      </td>
      </tr>
      </table>
      <![endif]-->
    </center>
  </body>
</html>
