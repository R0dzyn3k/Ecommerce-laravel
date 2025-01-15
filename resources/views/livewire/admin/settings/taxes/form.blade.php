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
      :label="__('pages.taxes.percentage')"
      wire:model="tax.percentage"
      :placeholder="__('pages.taxes.percentagePlaceholder')"
      type="number"
      step="1"
      min="0"
      max="100"
      required
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
