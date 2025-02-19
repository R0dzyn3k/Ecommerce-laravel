<div class="container mx-auto flex flex-col justify-center lg:flex-row gap-16 pt-24 max-w-[600px] pb-16 lg:max-w-[1100px] px-4">
  <div class="w-full lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-[--webPrimaryTextColour]">{{ __('auth.setPassword') }}</h2>

    <form wire:submit.prevent="setNewPassword">
      <x-form-input.input
        type="password"
        wire:model="password"
        :label="__('auth.newPassword')"
        :placeholder="__('user.passwordPlaceholder')"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)]] pt-2"
      />

      <x-form-input.input
        type="password"
        wire:model="password_confirmation"
        :label="__('auth.newPasswordConfirmation')"
        :placeholder="__('auth.newPasswordConfirmation')"
        web="true"
        labelClass="text-[var(--webPrimaryTextColour)]] pt-2"
      />

      <div class="flex items-center justify-center mt-4 gap-4">
        <x-buttons.secondary wire:click="login" web="true">
          {{ __('global.back') }}
        </x-buttons.secondary>
        <x-buttons.primary web="true">
          {{ __('global.save') }}
        </x-buttons.primary>
      </div>
    </form>
  </div>
</div>
