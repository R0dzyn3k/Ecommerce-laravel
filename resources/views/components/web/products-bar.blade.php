@props([
  'products' => [],
])

<div {{ $attributes->merge(['class' => 'gap-8 grid grid-cols-1 lg:grid-cols-2']) }}>
  @php /** @var $product \App\Models\Product */ @endphp
  @foreach ($products as $key => $product)
    <x-web.product-tile :product="$product" class="w-full" />
  @endforeach
</div>
