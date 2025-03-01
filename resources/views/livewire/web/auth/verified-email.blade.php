<x-web.card-half title="Potwierdzono adres e-mail">
  <p class="text-center text-[var(--webPrimaryTextColour)]">Adres e-mail został potwierdzony.</p>

  <x-web.button-group>
    <x-buttons.primary wire:click="homepage" web="true">
      Przejdź do strony głównej
    </x-buttons.primary>

    <x-buttons.primary wire:click="profile" web="true">
      Przejdź do profilu
    </x-buttons.primary>
  </x-web.button-group>
</x-web.card-half>
