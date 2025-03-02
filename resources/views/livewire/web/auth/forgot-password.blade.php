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
      <x-web.secondary-button type="button" href="{{ route('web.login') }}" wire:navigate>
        {{ __('global.back') }}
      </x-web.secondary-button>

      <x-web.primary-button>
        {{ __('auth.reset') }}
      </x-web.primary-button>
    </x-web.button-group>
  </form>
</x-web.card-half>
