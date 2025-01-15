<div>
  <h2 class="text-3xl font-bold pb-6">@lang('pages.profile.subTitle')</h2>

  <form wire:submit.prevent="save" class="max-w-[600px]">
    <x-form-input.input
      :label="__('user.firstname')"
      wire:model="profile.firstname"
      :placeholder="__('user.firstnamePlaceholder')"
      required
    />

    <x-form-input.input
      :label="__('user.lastname')"
      wire:model="profile.lastname"
      :placeholder="__('user.lastnamePlaceholder')"
      required
    />

    <x-form-input.input
      type="email"
      :label="__('user.email')"
      wire:model="profile.email"
      :placeholder="__('user.emailPlaceholder')"
      required
    />

    <x-form-input.input
      :label="__('user.phone')"
      wire:model="profile.phone"
      :placeholder="__('user.phonePlaceholder')"
    />

    <div class="flex items-center justify-center mt-4">
      <x-buttons.primary class="ms-3">{{ __('global.save') }}</x-buttons.primary>
    </div>
  </form>
</div>
