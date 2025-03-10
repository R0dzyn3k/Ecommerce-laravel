@php
  $url = $product->getFirstMediaUrl('product_photo', 'thumbnail') ?: asset('images/sample.webp');
@endphp

<div class="w-full bg-[var(--webPrimaryTabBackgroundColour)] p-8 rounded-2xl shadow-md h-full relative">
  <div class="flex flex-col gap-2 m-auto justify-between" style="height: inherit;">
    <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] pb-4">
      Produkt dnia
    </h2>

    <a href="{{ route('web.products.show', $product->slug) }}" wire:navigate>
      <img src="{{ $url }}" alt="{{ $product->title }}" class="w-full object-cover rounded-md hover:scale-105 transition delay-150 duration-300 ease-in-out" />
      <h4 class="mt-2 text-[var(--webPrimaryTextColour)] text-lg font-semibold truncate whitespace-nowrap">{{ $product->title }}</h4>
    </a>

    <!-- Price and button -->
    <div class="flex justify-between">
      <div class="flex flex-col">
        @if ($product->discount_price)
          <span class="text-sm text-[var(--webSecondaryLightTextColour)] line-through">
            {{ number_format($product->price_gross, 2) }} zł
          </span>
          <span class="text-lg font-bold text-[var(--webThirdLightTextColour)]">
            {{ number_format($product->discount_price, 2) }} zł
          </span>
        @else
          <span class="text-lg font-bold text-[var(--webThirdLightTextColour)] mt-auto">
            {{ number_format($product->price_gross, 2) }} zł
          </span>
        @endif
      </div>

      <div class="mt-auto">
        <x-web.primary-button
          :disabled="!$product->onStock()"
          type="button"
          wire:click="$dispatch('addToCart', { productId: {{ $product->id }}})"
        >
          Do koszyka
        </x-web.primary-button>
      </div>
    </div>
  </div>
</div>

