<div>
  <h2 class="text-3xl font-bold pb-6">
    @if($this->isExist)
      @lang('pages.taxes.edit')
    @else
      @lang('pages.taxes.new')
    @endif
  </h2>

  <form wire:submit.prevent="save" class="max-w-[600px]">
    <x-form-input.input
      :label="__('global.title')"
      wire:model="brand.title"
      :placeholder="__('global.titlePlaceholder')"
      required
    />

    <x-form-input.textarea
      :label="__('global.description')"
      wire:model="brand.description"
    />

    <x-form-input.checkbox
      :label="__('global.is_active')"
      wire:model="brand.is_active"
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
