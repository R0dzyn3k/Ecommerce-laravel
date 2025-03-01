<x-web.card-half :title="__('auth.resetPassword')">
  <form wire:submit.prevent="sendEmail">
    <x-form-input.input
      type="email"
      :label="__('user.email')"
      wire:model="email"
      :placeholder="__('user.emailPlaceholder')"
      required
      web="true"
      labelClass="text-[var(--webPrimaryTextColour)]"
    />

    <x-web.button-group>
      <x-buttons.secondary wire:click="login" web="true">
        {{ __('global.back') }}
      </x-buttons.secondary>

      <x-buttons.primary web="true">
        {{ __('auth.reset') }}
      </x-buttons.primary>
    </x-web.button-group>
  </form>
</x-web.card-half>
