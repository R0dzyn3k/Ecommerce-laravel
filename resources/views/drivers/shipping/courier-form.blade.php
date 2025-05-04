<div class="grid grid-cols-2 gap-4">
  <div class="mt-4">
    <x-form-input.input label="E-mail" wire:model="cart.shipping_data.email" required :web="true" />
  </div>

  <div class="mt-4">
    <x-form-input.input label="Telefon" wire:model="cart.shipping_data.phone" required :web="true" />
  </div>

  <div>
    <x-form-input.input label="Ulica" wire:model="cart.shipping_data.street" required :web="true" />
  </div>

  <div>
    <x-form-input.input label="Nr. budynku" wire:model="cart.shipping_data.building_nr" required :web="true" />
  </div>

  <div>
    <x-form-input.input label="Nr. mieszkania" wire:model="cart.shipping_data.apartment_nr" :web="true" />
  </div>

  <div>
    <x-form-input.input label="Kod pocztowy" wire:model="cart.shipping_data.postcode" required :web="true" />
  </div>

  <div>
    <x-form-input.input label="Miasto" wire:model="cart.shipping_data.city" required :web="true" />
  </div>

  <div>
    <x-form-input.input label="Województwo" wire:model="cart.shipping_data.region" required :web="true" />
  </div>
</div>

<div class="mt-4">
  <x-form-input.input label="Dodatkowa linia adresu" wire:model="cart.shipping_data.first_line" :web="true" />
</div>

<div class="mt-4">
  <x-form-input.input label="Druga linia adresu" wire:model="cart.shipping_data.second_line" :web="true" />
</div>
