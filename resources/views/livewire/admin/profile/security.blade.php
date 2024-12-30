<div>
  <h2 class="text-3xl font-bold pb-6">@lang('pages.profileSecurity.subTitle')</h2>

  <form wire:submit.prevent="save" class="max-w-[600px]">
    <x-form-input.input
      type="password"
      wire:model="password"
      :label="__('auth.currentPassword')"
      required
    />

    <x-form-input.input
      type="password"
      wire:model="newPassword"
      :label="__('auth.newPassword')"
      required
    />

    <x-form-input.input
      type="password"
      wire:model="newPassword_confirmation"
      :label="__('auth.newPasswordConfirmation')"
      required
    />

    <p>{{ __('pages.profile.passwordExpiryAt', ['attribute' => $profile->password_expiry_at ?? __('global.never') ]) }}</p>

    <div class="flex items-center justify-center mt-4">
      <x-buttons.primary class="ms-3">{{ __('global.save') }}</x-buttons.primary>
    </div>
  </form>
</div>
