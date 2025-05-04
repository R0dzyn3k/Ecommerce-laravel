<x-web.card-cart title="Koszyk">
  @if($showCart)
    <div class="flex flex-col gap-4 max-h-[60vh]">

      <!-- Cart - scrollable -->
      <div class="overflow-y-auto max-h-max flex flex-col gap-4">
        @php
          /** @var \App\Models\OrderItem $item */
        @endphp

        @foreach($items as $item)
          <div class="flex items-center max-lg:flex-wrap justify-between p-4 gap-4 bg-[var(--webPrimaryBackgroundColour)] rounded-lg shadow-md relative">

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
                <p class="text-[var(--webPrimaryTextColour)]">
                  {{ \Illuminate\Support\Str::limit($item->product->description, 80) }}
                </p>
              </div>
            </div>

            <!-- Amount -->
            <div class="flex flex-nowrap items-center justify-center h-full w-fit lg:w-1/5 gap-2">
              <button
                class="flex items-center justify-center text-[var(--webPrimaryLightTextColour)]
                     p-2 rounded-md border border-[var(--webThirdLightTextColour)] hover:border-[var(--webLightHoverColour)]
                     bg-[var(--webThirdLightTextColour)] hover:bg-[var(--webLightHoverColour)]
                     focus:ring-2 transition duration-300 ease-in-out"
                type="button"
                title="Zmniejsz ilość o 1"
                wire:click.throttle.250ms="decrement({{ $item->product_id }})"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                </svg>
              </button>

              <x-form-input.input
                title="Zmień ilość"
                type="number"
                class="max-md:w-full text-center [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                wire:change="updateItem({{ $item->product_id }}, $event.target.value)"
                :value="$item->amount"
                min="0"
                step="1"
                :web="true"
              />

              <button
                class="flex items-center justify-center text-[var(--webPrimaryLightTextColour)]
                     p-2 rounded-md border border-[var(--webThirdLightTextColour)] hover:border-[var(--webLightHoverColour)]
                     bg-[var(--webThirdLightTextColour)] hover:bg-[var(--webLightHoverColour)]
                     focus:ring-2 transition duration-300 ease-in-out"
                type="button"
                title="Zwiększ ilość o 1"
                wire:click.throttle.250ms="increment({{ $item->product_id }})"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6" />
                </svg>
              </button>
            </div>

            <!-- Price and remove btn -->
            <div class="flex h-full items-center w-auto lg:w-1/5 justify-between">
              <div class="flex flex-col w-full gap-2">
                <p class="w-full">Cena: {{ round($item->unit_price_gross, 2) }} zł</p>
                <p class="text-[var(--webPrimaryTextColour)] text-base">Suma: {{ round($item->amount * $item->unit_price_gross, 2) }} zł</p>
              </div>

              <button
                type="button"
                title="Usuń pozycję z koszyka"
                class="text-[var(--webPrimaryLightTextColour)]
                     p-2 rounded-md border border-red-500 hover:border-red-500
                     bg-red-300 hover:bg-red-500
                     focus:ring-2 transition duration-500 ease-in-out
                     max-lg:absolute max-lg:top-2 max-lg:right-2

                     "
                wire:click="removeItem({{ $item->product_id }})"
              >
                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" class="h-2 w-2"
                  viewBox="0 0 460.775 460.775" xml:space="preserve">
                  <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565
                    c-2.913-2.911-6.866-4.55-10.992-4.55c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565
                    c-2.913-2.911-6.866-4.55-10.993-4.55c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986
                    l171.138,171.128L4.575,401.505c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55
                    c4.127,0,8.08-1.639,10.994-4.55l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55
                    c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z" />
                </svg>
              </button>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Buy now - button -->
      <div class="flex items-center justify-between">
        <p class="text-[var(--webPrimaryTextColour] font-bold">
          Łącznie: {{ round($items->reduce(fn(float $sum, \App\Models\OrderItem $item) => $sum += ($item->unit_price_gross * $item->amount), 0), 2) }}
        </p>
        @if ($this->showCart)
          <x-web.primary-button
            href="{{ \Illuminate\Support\Facades\Auth::guard('web')->check() ? route('web.order.delivery-and-payment') : route('web.order.login-or-register') }}"
            wire:navigate
          >
            Do kasy
          </x-web.primary-button>
        @endif
      </div>

    </div>
  @else
    <p class="text-[var(--webPrimaryTextColour)]">Twój koszyk jest pusty.</p>
  @endif
</x-web.card-cart>
