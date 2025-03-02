<div>
  <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6">{{ __('pages.profileSecurity.subTitle') }}</h2>

  <form wire:submit.prevent="save" class="max-w-[600px]">
    <x-form-input.input
      type="password"
      wire:model="password"
      :label="__('auth.currentPassword')"
      :placeholder="__('user.passwordPlaceholder')"
      required
      web="true"
      labelClass="text-[var(--webPrimaryTextColour)] pt-2"
    />

    <x-form-input.input
      type="password"
      wire:model="newPassword"
      :label="__('auth.newPassword')"
      :placeholder="__('user.newPasswordPlaceholder')"
      required
      web="true"
      labelClass="text-[var(--webPrimaryTextColour)] pt-2"
    />

    <x-form-input.input
      type="password"
      wire:model="newPassword_confirmation"
      :label="__('auth.newPasswordConfirmation')"
      :placeholder="__('auth.newPasswordConfirmation')"
      required
      web="true"
      labelClass="text-[var(--webPrimaryTextColour)] pt-2"
    />

    <p>{{ __('pages.profile.passwordExpiryAt', ['attribute' => $profile->password_expiry_at ?? __('global.never') ]) }}</p>

    <x-web.button-group>
      <x-web.primary-button>
        {{ __('global.save') }}
      </x-web.primary-button>
    </x-web.button-group>
  </form>
</div>
