<div class="w-full mx-auto flex flex-col lg:flex-row gap-16">
  <x-web.card-half :title="__('pages.login')">
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

      <x-web.button-group>
        <x-buttons.primary web="true">
          Zaloguj się
        </x-buttons.primary>
      </x-web.button-group>
    </form>
  </x-web.card-half>

  <x-web.card-half :title="__('pages.register')">

    <p class="mb-4 text-[var(--webPrimaryTextColour)]">Dołącz, aby cieszyć się:</p>
    <ul class="list-disc list-inside mb-4">
      <li class="text-[var(--webPrimaryTextColour)]">Szybkimi zakupami</li>
      <li class="text-[var(--webPrimaryTextColour)]">Specjalnymi promocjami</li>
      <li class="text-[var(--webPrimaryTextColour)]">Historią zamówień</li>
    </ul>

    <x-web.button-group>
      <x-buttons.primary wire:click="register" web="true">
        Załóż konto
      </x-buttons.primary>
    </x-web.button-group>
  </x-web.card-half>
</div>
