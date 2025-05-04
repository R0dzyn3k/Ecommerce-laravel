<div>
  <h2 class="text-3xl font-bold pb-6">
    @if($this->isExist)
      Edycja metody dostawy
    @else
      Nowa metoda dostawy
    @endif
  </h2>

  <form wire:submit.prevent="save" class="max-w-[600px]">
    <x-form-input.checkbox
      :label="__('global.is_active')"
      wire:model="method.is_active"
    />

    <x-form-input.select
      label="Sterownik" wire:model="method.driver"
      :options="$shippingManager->mapForSelect()"
      :disabled="$this->isExist"
      required
    />

    <x-form-input.input
      label="Nazwa"
      wire:model="method.name"
      placeholder="Nazwa metody płatności"
      required
    />

    <x-form-input.input
      label="Koszt"
      wire:model="method.cost"
      placeholder="Koszt"
      type="number"
      required
      min="0"
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
