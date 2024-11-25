<div>
  <h2 class="text-3xl font-bold pb-6">{{ __('pages.profile.subTitle') }}</h2>

  <form wire:submit.prevent="update" class="max-w-[600px]">
        <x-form-input.input wire:model="name" :model="$name" name="name" :label="__('pages.profile.name')" />
        <x-form-input.input wire:model="email" :model="$profile" name="email" type="email" :label="__('auth.email')" />
        <x-form-input.password wire:model="password" :model="$profile" name="password" :label="__('auth.currentPassword')" />
        <x-form-input.password wire:model="newPassword" :model="$profile" name="newPassword" :label="__('auth.newPassword')" />
        <x-form-input.password wire:model="newPassword_confirmation" name="newPassword_confirmation" :label="__('auth.newPasswordConfirmation')" />
        <p>{{ __('pages.profile.passwordExpiryAt', ['attribute' => $profile->password_expiry_at ?? __('pages.profile.never') ]) }}</p>

        <div class="flex items-center justify-center mt-4">
          <x-buttons.primary class="ms-3">{{ __('global.save') }}</x-buttons.primary>
        </div>
  </form>
</div>
