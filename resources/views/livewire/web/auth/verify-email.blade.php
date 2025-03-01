<x-web.card-half title="Potwierdź adres e-mail">
  <p class="text-center text-[var(--webPrimaryTextColour)]">Kliknij w link weryfikacyjny, który został wysłany na Twój adres e-mail.</p>

  <x-web.button-group>
    <x-buttons.secondary wire:click="logOut" web="true">
      wyloguj się
    </x-buttons.secondary>

    <x-buttons.primary wire:click="resend" web="true">
      Wyślij ponownie
    </x-buttons.primary>
  </x-web.button-group>
</x-web.card-half>
