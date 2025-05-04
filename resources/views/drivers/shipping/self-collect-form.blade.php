<div class="grid grid-cols-2 gap-4">
  <div class="mt-4">
    <x-form-input.input label="E-mail" wire:model="cart.shipping_data.email" required :web="true" />
  </div>

  <div class="mt-4">
    <x-form-input.input label="Telefon" wire:model="cart.shipping_data.phone" required :web="true" />
  </div>
</div>
