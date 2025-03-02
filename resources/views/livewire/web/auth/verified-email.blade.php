<x-web.card-half title="Potwierdzono adres e-mail">
  <p class="text-center text-[var(--webPrimaryTextColour)]">Adres e-mail został potwierdzony.</p>

  <x-web.button-group>
    <x-web.primary-button href="{{ route('web.homepage') }}" wire:navigate>
      Przejdź do strony głównej
    </x-web.primary-button>

    <x-web.primary-button href="{{ route('web.profile.edit') }}" wire:navigate>
      Przejdź do profilu
    </x-web.primary-button>
  </x-web.button-group>
</x-web.card-half>
