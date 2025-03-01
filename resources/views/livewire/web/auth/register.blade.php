<div class="w-full mx-auto flex flex-col lg:flex-row gap-16">
  <x-web.card-half :title="__('pages.register')">
    <form wire:submit.prevent="register">
      <x-form-input.input
        :label="__('user.firstname')"
        wire:model="customer.firstname"
        :placeholder="__('user.firstnamePlaceholder')"
        required
        web="true"
      />

      <x-form-input.input
        :label="__('user.lastname')"
        wire:model="customer.lastname"
        :placeholder="__('user.lastnamePlaceholder')"
        required
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] pt-2"
      />

      <x-form-input.input
        type="email"
        :label="__('user.email')"
        wire:model="customer.email"
        :placeholder="__('user.emailPlaceholder')"
        required
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] pt-2"
      />

      <x-form-input.input
        :label="__('user.phone')"
        wire:model="customer.phone"
        :placeholder="__('user.phonePlaceholder')"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] pt-2"
      />

      <x-form-input.input
        type="password"
        wire:model="password"
        :label="__('auth.newPassword')"
        :placeholder="__('user.passwordPlaceholder')"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] pt-2"
        required
      />

      <x-form-input.input
        type="password"
        wire:model="password_confirmation"
        :label="__('auth.newPasswordConfirmation')"
        :placeholder="__('auth.newPasswordConfirmation')"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] pt-2"
        required
      />

      <x-form-input.checkbox
        name="term"
        wire:model="term"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] mt-4"
        class="bg-white border-gray-400 mt-4"
        required
      >
        <x-slot:label>
          Akceptuję <a href="{{ route('web.terms') }}" wire:navigate class='text-[var(--webLightHoverColour)] hover:text-[var(--webThirdLightTextColour)]'>regulamin</a>
        </x-slot:label>
      </x-form-input.checkbox>

      <x-web.button-group>
        <x-buttons.primary web="true">
          Zarejestruj się
        </x-buttons.primary>
      </x-web.button-group>
    </form>
  </x-web.card-half>

  <x-web.card-half title="Masz już konto?">
    <x-web.button-group>
      <x-buttons.primary wire:click="login" web="true">
        Zaloguj się
      </x-buttons.primary>
    </x-web.button-group>
  </x-web.card-half>
</div>
