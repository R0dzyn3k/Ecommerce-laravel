<div>
  <h2 class="text-3xl font-bold pb-6">
    @if($this->isExist)
      @lang('pages.administrators.edit')
    @else
      @lang('pages.administrators.new')
    @endif
  </h2>

  <form wire:submit.prevent="save" class="max-w-[600px]">
    <x-form-input.input
      :label="__('user.firstname')"
      wire:model="admin.firstname"
      :placeholder="__('user.firstnamePlaceholder')"
      required
    />

    <x-form-input.input
      :label="__('user.lastname')"
      wire:model="admin.lastname"
      :placeholder="__('user.lastnamePlaceholder')"
      required
    />

    <x-form-input.input
      type="email"
      :label="__('user.email')"
      wire:model="admin.email"
      :placeholder="__('user.emailPlaceholder')"
      required
    />

    <x-form-input.input
      :label="__('user.phone')"
      wire:model="admin.phone"
      :placeholder="__('user.phonePlaceholder')"
      required
    />

    <x-form-input.input
      type="password"
      wire:model="password"
      :label="__('auth.newPassword')"
      :placeholder="__('user.passwordPlaceholder')"
    />

    <x-form-input.input
      type="password"
      wire:model="password_confirmation"
      :label="__('auth.newPasswordConfirmation')"
      :placeholder="__('auth.newPasswordConfirmation')"
    />

    <div class="flex items-center justify-center mt-4">
      <x-buttons.primary class="ms-3">
        @if($this->isExist)
          @lang('global.save')
        @else
          @lang('global.create')
        @endif
      </x-buttons.primary>
    </div>
  </form>
</div>
