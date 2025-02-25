<div class="container mx-auto flex flex-col justify-center lg:flex-row gap-16 pt-24 max-w-[600px] pb-16 lg:max-w-[1100px] px-4">
  <div class="w-full lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-[--webPrimaryTextColour]">{{ __('auth.resetPassword') }}</h2>

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

      <div class="flex items-center justify-center mt-4 gap-4">
        <x-buttons.secondary wire:click="login" web="true">
          {{ __('global.back') }}
        </x-buttons.secondary>
        <x-buttons.primary web="true">
          {{ __('auth.reset') }}
        </x-buttons.primary>
      </div>
    </form>
  </div>
</div>
