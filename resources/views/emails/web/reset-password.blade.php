<x-emails.layout title="Powiadomienie o resetowaniu hasła">
  <tr>
    <td style="background-color: #ffffff;" class="darkmode-bg">
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
          <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
            <h1 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;">
              Witaj!
            </h1>
            <p>
              Otrzymałeś ten e-mail, ponieważ otrzymaliśmy prośbę o zresetowanie hasła dla Twojego konta.
            </p>
          </td>
        </tr>
        <tr>
          <td style="padding: 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
              <tr>
                <td class="button-td button-td-primary" style="border-radius: 4px; background: #222222;">
                  <a class="button-a button-a-primary" href="{{ $url }}" style="background: #222222; border: 1px solid #000000; font-family: sans-serif; font-size: 15px; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;">
                    Zresetuj hasło
                  </a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
            <p>Ten link do resetowania hasła wygaśnie za {{ $expire }} minut.</p>
            <p>Jeśli nie wysyłałeś prośby o resetowanie hasła, zignoruj tę wiadomość.</p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="background-color: #ffffff;" class="darkmode-bg">
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
          <td style="padding: 0 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
            <p>
              Jeśli masz problem z kliknięciem przycisku „Zresetuj hasło”, skopiuj i wklej poniższy adres URL do swojej przeglądarki:
              <a href="{{ $url }}" style="color: teal; word-break: break-all;">{{ $url }}</a>
            </p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</x-emails.layout>
