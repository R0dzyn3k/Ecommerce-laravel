<div class="container mx-auto flex flex-col justify-center lg:flex-row gap-16 pt-24 max-w-[600px] pb-16 lg:max-w-[1100px] px-4">
  <div class="w-full lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-[--webPrimaryTextColour]">{{ $verify ? 'Potwierdzono adres e-mail' : 'Potwierdź adres e-mail' }}</h2>

    @if ($verify)
      <p class="text-center text-[var(--webPrimaryTextColour)]">Adres e-mail został potwierdzony.</p>

      <div class="flex items-center justify-center mt-4 gap-4">
        <x-buttons.primary wire:click="homepage" web="true">
          Przejdź do strony głównej
        </x-buttons.primary>

        <x-buttons.primary wire:click="profile" web="true">
          Przejdź do profilu
        </x-buttons.primary>
      </div>
    @else
      <p class="text-center text-[var(--webPrimaryTextColour)]">Kliknij w link weryfikacyjny, który został wysłany na Twój adres e-mail.</p>

      <div class="flex items-center justify-center mt-4 gap-4">
        <x-buttons.secondary wire:click="logOut" web="true">
          wyloguj się
        </x-buttons.secondary>

        <x-buttons.primary wire:click="resend" web="true">
          Wyślij ponownie
        </x-buttons.primary>
        @endif
      </div>
  </div>
</div>
