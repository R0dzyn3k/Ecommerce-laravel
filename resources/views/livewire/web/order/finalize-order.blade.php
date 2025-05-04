<x-web.card-cart title="Finalizacja zamówienia">
  <div class="grid grid-cols-2 gap-8">

    <div>
      <h3 class="text-2xl font-semibold pb-4">Szczegóły</h3>

      <div class="flex gap-4 pb-2">
        <div class="w-1/2">
          <label class="block font-medium">
            {{ __('pages.orders.billingMethod') }}
          </label>
          <div class="mt-1 text-gray-400">
            {{ $billingDriver->getLabel() }}
          </div>
        </div>
      </div>

      <div class="flex gap-4 pb-2">
        <div class="w-1/2">
          <label class="block font-medium">
            {{ __('pages.orders.totalGross') }}
          </label>
          <div class="mt-1 text-gray-400">
            {{ number_format($cart->total_gross, 2) }} zł
          </div>
        </div>
      </div>

      @if($cart->discount_gross > 0)
        <div class="flex gap-4 pb-2">
          <div class="w-1/2">
            <label class="block font-medium">
              {{ __('pages.orders.discountGross') }}
            </label>
            <div class="mt-1 text-gray-400">
              {{ number_format($cart->discount_gross, 2) }} zł
            </div>
          </div>
        </div>
      @endif

      <div class="flex gap-4 pb-2">
        <div class="w-1/2">
          <label class="block font-medium">
            {{ __('pages.orders.shippingMethod') }}
          </label>
          <div class="mt-1 text-gray-400">
            {{ $shippingDriver->getLabel() }}
          </div>
        </div>
        <div class="w-1/2">
          <label class="block font-medium">
            Koszt dostawy
          </label>
          <div class="mt-1 text-gray-400">
            @if($this->cart->shipping_cost === 0)
              <span class="text-green-600 font-semibold">Za darmo</span>
            @else
              {{ round($this->cart->shipping_cost, 2) }} zł
            @endif
          </div>
        </div>
      </div>

      @includeIf($shippingDriver->getViewPathDetails())
    </div>

    <div class="overflow-y-auto max-h-max gap-4">
      <h3 class="text-2xl font-semibold">Produkty</h3>
      @php
        /** @var \App\Models\OrderItem $item */
      @endphp

      @foreach($items as $item)
        <div class="flex items-center max-lg:flex-wrap justify-between p-4 gap-4 bg-[var(--webPrimaryBackgroundColour)] my-4 rounded-lg shadow-md relative">

          <!-- Product info -->
          <div class="flex items-center w-full lg:w-3/5">
            <a href="{{ route('web.products.show', $item->product->slug) }}" wire:navigate>
              <img
                src="{{ $item->product->getFirstMediaUrl('product_photo') ?: asset('images/sample.webp') }}"
                alt="{{ $item->product->title }}"
                class="w-16 h-16 object-cover rounded-md"
              >
            </a>
            <div class="ml-4">
              <a href="{{ route('web.products.show', $item->product->slug) }}" wire:navigate>

                <h2 class="text-lg font-bold text-[var(--webPrimaryTextColour)]">
                  {{ $item->product->title }}
                </h2>
              </a>

            </div>
          </div>

          <!-- Price and remove btn -->
          <div class="flex h-full items-center w-auto lg:w-1/5 justify-between">
            <div class="flex flex-col w-full gap-2">
              <p class="text-[var(--webPrimaryTextColour)] text-base">Suma: {{ round($item->total_price_gross, 2) }} zł</p>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>

  <x-web.button-group>
    <x-web.primary-button wire:click="buy">Kup teraz</x-web.primary-button>
  </x-web.button-group>
</x-web.card-cart>
