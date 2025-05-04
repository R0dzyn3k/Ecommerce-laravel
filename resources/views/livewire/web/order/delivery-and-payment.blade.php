<x-web.card-cart>
  <form wire:submit.prevent="saveDeliveryData">
    <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6 text-center ">Dostawa</h2>

    <!-- Shipping method -->
    <div class="mb-8">
      <h3 class="text-lg font-semibold mb-4">Sposób dostawy</h3>

      <div class="space-y-4">
        @foreach(App\Models\ShippingMethod::mapForRadio() as $method)
          <label class="flex items-start space-x-3 p-4 bg-white border rounded-lg cursor-pointer hover:bg-gray-50">
            <input
              type="radio"
              name="cart.shipping_method_id"
              wire:model.live="cart.shipping_method_id"
              value="{{ $method['id'] }}"
              class="mt-1"
            >
            <div>
              <div class="font-medium text-gray-900">{{ $method['name'] }}</div>
              <div class="text-sm text-gray-600">
                Koszt dostawy:
                @if($method['cost'] == 0)
                  <span class="text-green-600 font-semibold">Darmowa</span>
                @else
                  {{ number_format($method['cost'], 2) }} zł
                @endif
              </div>
            </div>
          </label>
          @error('cart.shipping_method_id')
          <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
          @enderror
        @endforeach
      </div>
    </div>

    @isset($this->cart->shipping_method_id)
      <div class="mb-8">
        @includeIf($shippingManager->getShippingMethodForm($this->getShippingDriver()))
      </div>
    @endif

    @if($this->cart->shipping_method_id)
      <!-- Billing method -->
      <div class="my-8">
        <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6 text-center ">Płatność</h2>

        <div class="space-y-4">
          @foreach(App\Models\BillingMethod::mapForRadio() as $method)
            <label class="flex items-start space-x-3 p-4 bg-white border rounded-lg cursor-pointer hover:bg-gray-50">
              <input
                type="radio"
                name="cart.billing_method_id"
                wire:model.live="cart.billing_method_id"
                value="{{ $method['id'] }}"
                class="mt-1"
              >
              <div class="font-medium text-gray-900">{{ $method['name'] }}</div>
            </label>
          @endforeach

          @error('cart.billing_method_id')
          <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>

      @isset($this->cart->billing_method_id)
        <div class="mb-8">
          @includeIf($billingManager->getBillingMethodForm($this->getBillingDriver()))
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
</x-web.card-cart>
