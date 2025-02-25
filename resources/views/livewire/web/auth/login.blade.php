<div class="container mx-auto flex flex-col lg:flex-row gap-16 pt-24 max-w-[600px] pb-16 lg:max-w-[1100px] px-4">
  <div class="w-full lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-[--webPrimaryTextColour]">{{ __('pages.login') }}</h2>

    <form wire:submit.prevent="auth">
      <x-form-input.input
        name="email"
        type="email"
        wire:model="email"
        :label="__('auth.email')"
        required
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] pt-2"
      />

      <x-form-input.input
        name="password"
        type="password"
        wire:model="password"
        :label="__('auth.password')"
        required
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] pt-2"
      />
      <div class="w-full flex justify-end">
        <a wire:click.prevent="forgotPassword" class="cursor-pointer p-1 hover:text-[var(--webLightHoverColour)]">Zapomniałeś hasła?</a>
      </div>

      <x-form-input.checkbox
        name="remember"
        wire:model="remember"
        :label="__('auth.rememberMe')"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)]"
      />

      <div class="flex items-center justify-center mt-4">
        <x-buttons.primary web="true">
          Zaloguj się
        </x-buttons.primary>
      </div>
    </form>
  </div>

  <div class="w-full h-fit lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-[#15141Atext-[var(--webPrimaryTextColour)]">{{ __('pages.register') }}</h2>

    <p class="mb-4 text-[var(--webPrimaryTextColour)]">Dołącz, aby cieszyć się:</p>
    <ul class="list-disc list-inside mb-4">
      <li class="text-[var(--webPrimaryTextColour)]">Szybkimi zakupami</li>
      <li class="text-[var(--webPrimaryTextColour)]">Specjalnymi promocjami</li>
      <li class="text-[var(--webPrimaryTextColour)]">Historią zamówień</li>
    </ul>

    <div class="flex items-center justify-center mt-4">
      <x-buttons.primary wire:click="register" web="true">
        Załóż konto
      </x-buttons.primary>
    </div>
  </div>
</div>
