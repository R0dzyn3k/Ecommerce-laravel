<div class="container mx-auto flex flex-col lg:flex-row gap-16 pt-24 max-w-[600px] pb-16 lg:max-w-[1100px] px-4">
  <div class="w-full lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-[--webPrimaryTextColour]">{{ __('pages.register') }}</h2>

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
      />

      <x-form-input.input
        type="password"
        wire:model="password_confirmation"
        :label="__('auth.newPasswordConfirmation')"
        :placeholder="__('auth.newPasswordConfirmation')"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] pt-2"
      />

      <x-form-input.checkbox
        name="term"
        wire:model="term"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)] mt-4"
        class="bg-white border-gray-400 mt-4"
      >
        <x-slot:label>
          Akceptuję <a href="{{ route('web.terms') }}" wire:navigate class='text-[var(--webLightHoverColour)] hover:text-[var(--webThirdLightTextColour)]'>regulamin</a>
        </x-slot:label>
      </x-form-input.checkbox>

      <div class="flex items-center justify-center mt-4">
        <x-buttons.primary web="true">
          Zarejestruj się
        </x-buttons.primary>
      </div>
    </form>
  </div>

  <div class="w-full h-full lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-[#15141Atext-[var(--webPrimaryTextColour)]">Masz już konto:</h2>

    <div class="flex items-center justify-center mt-4">
      <x-buttons.primary wire:click="login" web="true">
        Zaloguj się
      </x-buttons.primary>
    </div>
  </div>
</div>
