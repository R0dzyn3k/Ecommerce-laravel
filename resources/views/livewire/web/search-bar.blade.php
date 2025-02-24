<div
  x-data
  x-on:keydown.escape.window="$wire.closeSearchResults()"
  x-on:click.outside="$wire.closeSearchResults()"
  class="w-full relative"
>
  <input
    wire:model.live="search"
    type="text"
    placeholder="Szukaj produktów..."
    class="w-full rounded-md shadow-sm border border-[var(--webLightHoverColour)]
      focus:ring-[var(--webThirdLightTextColour)] focus:ring-opacity-50
      focus:bg-[var(--webThirdLightTextColour)] focus:border-[var(--webThirdLightTextColour)] focus:scale-105
      hover:bg-[var(--webThirdLightTextColour)] hover:border-[var(--webThirdLightTextColour)] hover:scale-105
      transition delay-150 duration-300 ease-in-out
      hover:text-[var(--webPrimaryTabBackgroundColour)] focus:text-[var(--webPrimaryTabBackgroundColour)]
      hover:placeholder-[var(--webPrimaryTabBackgroundColour)] focus:placeholder-[var(--webPrimaryTabBackgroundColour)]"
  >

  @if ($showResults && $results->isNotEmpty())
    <div class="absolute z-50 bg-white w-full shadow-lg rounded-md border mt-1 max-h-60 overflow-auto">
      @foreach ($results as $product)
        <a href="{{ route('web.products.show', $product->slug) }}"
          class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 transition"
          wire:navigate>

          <div class="flex items-center gap-2">
            <img src="{{ $product->getFirstMediaUrl('product_photo', 'miniature') ?? asset('images/sample.webp') }}"
              alt="{{ $product->title }}"
              class="w-8 h-8 rounded object-cover">
            <span>{{ $product->title }}</span>
          </div>

          <div class="text-right">
            @if($product->discount_price)
              <span class="text-sm line-through text-gray-400">
                {{ number_format($product->price, 2) }} zł
              </span>
              <span class="font-bold text-indigo-600 ml-1">
                {{ number_format($product->discount_price, 2) }} zł
              </span>
            @else
              <span class="font-bold text-indigo-600">
                {{ number_format($product->price, 2) }} zł
              </span>
            @endif
          </div>
        </a>
      @endforeach
    </div>
  @elseif($showResults && strlen($search) >= 3)
    <div class="absolute z-50 bg-white w-full shadow-lg rounded-md border mt-1 px-4 py-2 text-gray-500">
      Brak wyników dla "{{ $search }}"
    </div>
  @endif
</div>
