<div>
  <h2 class="text-3xl font-bold pb-6">
    @if($this->isExist)
      Edycja płatności
    @else
      Nowa płatność
    @endif
  </h2>

  <form wire:submit.prevent="save" class="max-w-[600px]">
    <x-form-input.checkbox
      :label="__('global.is_active')"
      wire:model="method.is_active"
    />

    <x-form-input.select
      label="Sterownik" wire:model="method.driver"
      :options="$billingManager->mapForSelect()"
      :disabled="$this->isExist"
      required
    />

    <x-form-input.input
      label="Nazwa"
      wire:model="method.name"
      placeholder="Nazwa metody płatności"
      required
    />
    <div class="flex items-center justify-center mt-4">
      <x-buttons.primary>
        @if($this->isExist)
          @lang('global.save')
        @else
          @lang('global.create')
        @endif
      </x-buttons.primary>
    </div>
  </form>
</div>
