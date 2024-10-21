<x-layouts.base-login :title="__('pages.dashboard')">
  <x-form.base type="POST">
    <x-form-input.input name="email" type="email" :label="__('auth.email')" required />
    <x-form-input.password name="password" :label="__('auth.password')" required />
    <x-form-input.checkbox name="remember" :label="__('auth.rememberMe')" />

      <div class="flex items-center justify-center mt-4">
        <x-buttons.primary class="ms-3">
          {{ __('Log in') }}
        </x-buttons.primary>
      </div>
  </x-form.base>
</x-layouts.base-login>
