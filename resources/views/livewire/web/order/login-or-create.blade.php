<div class="w-full mx-auto flex flex-col lg:flex-row gap-16">
  <x-web.card-half title="Zaloguj się / Zarejestruj się">

    <x-web.button-group>
      <x-web.primary-button href="{{ route('web.login') }}" wire:navigate>
        Zaloguj się
      </x-web.primary-button>
       / 
      <x-web.primary-button href="{{ route('web.register') }}" wire:navigate>
        Zaloguj się
      </x-web.primary-button>

    </x-web.button-group>
  </x-web.card-half>

  <x-web.card-half :title="__('pages.register')">
    <x-web.button-group>
      <x-web.secondary-button href="{{ route('web.order.delivery-and-payment') }}" wire:navigate>
        Kontynuuuj bez logowania
      </x-web.secondary-button>
    </x-web.button-group>
  </x-web.card-half>
</div>
