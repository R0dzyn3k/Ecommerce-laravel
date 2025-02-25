@props([
  'products' => [],
  'title' => '',
  'removeLast' => false,
  'maxProducts' => 3,
  'gridCols' => 3,
])

@php
    $classes = match ($gridCols) {
      3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
      2 => 'grid-cols-1 sm:grid-cols-2',
      default => '',
    };
@endphp


<div {{ $attributes->merge(['class' => 'bg-[var(--webPrimaryTabBackgroundColour)] p-8 rounded-2xl shadow-md w-full']) }} >
  <h2 class="text-2xl font-bold mb-6">{{ $title }}</h2>
  <div class="gap-8 grid grid-cols-1 {{ $classes }}">

    @php /** @var $product \App\Models\Product */ @endphp
    @foreach ($products as $key => $product)
      @php
        $extraClasses = 'w-full';
        $extraClasses .= $loop->last && $removeLast && $key === ($maxProducts - 1) ?  ' max-lg:hidden' : '';
      @endphp

      <x-web.product-tile :product="$product" class="{{ $extraClasses }}" />
    @endforeach

  </div>
</div>
