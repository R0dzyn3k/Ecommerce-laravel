@props([
    'product',
    'url',
    'class' => '',
])

@php($url = $url ?? asset('images/sample.webp'))

<div class="flex flex-col justify-between flex-1 gap-2 lg:max-w-[240px] xl:max-w-[360px] m-auto {{ $class }}">
  <div>
    <img src="{{ $url }}" alt="{{ $product->title }}" class="w-full h-80 object-cover rounded-md hover:scale-105 transition delay-150 duration-300 ease-in-out" />
    <h4 class="mt-2 text-lg font-semibold truncate whitespace-nowrap">{{ $product->title }}</h4>
  </div>

  <!-- Price and button -->
  <div class="flex justify-between items-center">
    <span class="text-lg font-bold text-indigo-600">
      {{ number_format($product->discount_price ?? $product->price, 2) }} zł
    </span>
    <a href="{{ route('web.homepage', $product->id) }}"
      class="text-sm text-nowrap tracking-widest uppercase px-4 py-3 rounded-xl focus:ring-2
        text-[var(--webPrimaryLightTextColour)] bg-[var(--webLightHoverColour)]
        hover:bg-[var(--webThirdLightTextColour)] border border-[var(--webLightHoverColour)]
        hover:border-[var(--webThirdLightTextColour)] hover:scale-105 transition delay-150 duration-300 ease-in-out">
      Do koszyka
    </a>
  </div>
</div>
