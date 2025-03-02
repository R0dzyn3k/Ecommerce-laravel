<x-web.card-half title="Potwierdź adres e-mail">
  <p class="text-center text-[var(--webPrimaryTextColour)]">Kliknij w link weryfikacyjny, który został wysłany na Twój adres e-mail.</p>

  <x-web.button-group>
    <x-web.secondary-button href="{{ route('web.logout') }}" wire:navigate>
      wyloguj się
    </x-web.secondary-button>

    <x-web.primary-button wire:click="resend">
      Wyślij ponownie
    </x-web.primary-button>
  </x-web.button-group>
</x-web.card-half>
