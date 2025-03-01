<x-web.card-half :title="__('auth.setPassword')">
  <form wire:submit.prevent="setNewPassword">
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

    <x-web.button-group>
      <x-buttons.secondary wire:click="login" web="true">
        {{ __('global.back') }}
      </x-buttons.secondary>

      <x-buttons.primary web="true">
        {{ __('global.save') }}
      </x-buttons.primary>
    </x-web.button-group>
  </form>
</x-web.card-half>
