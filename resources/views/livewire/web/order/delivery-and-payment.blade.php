<x-web.card-half>
  <form wire:submit.prevent="saveDeliveryData">
    <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6 text-center ">Dostawa</h2>

    <!-- Shipping method -->
    <div class="mb-8">
      <x-form-input.select label="Sposób dostawy" wire:model.live="cart.shipping_driver" :options="$shippingManager->mapForSelect()" required :web="true" />
    </div>

    @isset($cart->shipping_driver)
      <div class="mb-8">
        @includeIf($shippingManager->getShippingMethodForm($cart->shipping_driver))
      </div>
    @endif

    @if($cart->shipping_driver)
      <!-- Billing method -->
      <div class="my-8">
        <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6 text-center ">Płatność</h2>

        <x-form-input.select label="Metoda płatności" wire:model.live="cart.billing_driver" :options="$billingManager->mapForSelect()" required :web="true" />
      </div>

      @isset($cart->billing_driver)
        <div class="mb-8">
          @includeIf($billingManager->getBillingMethodForm($cart->billing_driver))
        </div>
      @endif

    @endif
    <!-- Comment -->
    <div class="my-8">
      <x-form-input.textarea
        label="Komentarz do przelewu"
        wire:model="cart.customer_note"
        :web="true"
        minlength="3"
      />
    </div>

    <x-web.button-group>
      <x-web.primary-button>
        Zapisz i przejdź dalej
      </x-web.primary-button>
    </x-web.button-group>

  </form>
</x-web.card-half>
