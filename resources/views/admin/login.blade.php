<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
  <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
    <h2 class="text-2xl font-bold text-center mb-6 text-[var(--adminTextColour)]">{{ __('pages.login') }}</h2>

    @if ($errors->any())
      <div class="mb-4 bg-red-100 text-red-600 p-4 rounded-md">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form wire:submit.prevent="auth" class="max-w-[600px]">
      <x-form-input.input name="email" type="email" wire:model="email" :label="__('auth.email')" required />
      <x-form-input.input name="password" type="password" wire:model="password" :label="__('auth.password')" required />
      <x-form-input.checkbox name="remember" wire:model="remember" :label="__('auth.rememberMe')" />

      <div class="flex items-center justify-center mt-4">
        <x-buttons.primary class="ms-3">
          {{ __('auth.logIn') }}
        </x-buttons.primary>
      </div>
    </form>
  </div>
</div>

