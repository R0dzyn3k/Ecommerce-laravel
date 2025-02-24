<x-layouts.web title="{{ $product->title }}">
  <div class="container mx-auto px-4 py-10 lg:py-16 ">

    <!-- Breadcrumbs -->
    <nav class="text-sm mb-6 text-gray-600">
      <a href="{{ route('web.homepage') }}" class="hover:underline" wire:navigate>Strona główna</a> /
      <a href="{{ route('web.products.index') }}" class="hover:underline" wire:navigate>Produkty</a> /
      <span class="text-gray-900">{{ $product->title }}</span>
    </nav>

    <!-- Product section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 bg-[var(--webPrimaryTabBackgroundColour)] p-8 rounded-2xl shadow-md">

      <!-- Product image -->
      <div class="w-full rounded-xl shadow-md">
        <img src="{{ $product->getFirstMediaUrl('product_photo') ?? asset('images/sample.webp') }}"
          alt="{{ $product->title }}"
          class="w-full max-h-[600px] object-cover p-2"
        />
      </div>

      <!-- Product details -->
      <div class="flex flex-col gap-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $product->title }}</h1>

        <p class="text-gray-700 text-lg">{{ $product->description }}</p>

        <div class="flex items-center gap-4">
          <span class="text-2xl font-bold text-indigo-600">
            {{ number_format($product->discount_price ?? $product->price, 2) }} zł
          </span>
          @if($product->discount_price)
            <span class="text-gray-500 line-through">
              {{ number_format($product->price, 2) }} zł
            </span>
          @endif
        </div>

        <div class="flex items-center gap-4">
          <span class="text-sm text-gray-600">
            Dostępność:
            <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
              {{ $product->stock > 0 ? 'Dostępny' : 'Brak na stanie' }}
            </span>
          </span>
        </div>

        <div class="flex gap-4">
          <a href="{{ route('web.homepage', $product->id) }}"
            class="text-sm tracking-widest uppercase px-6 py-3 rounded-xl focus:ring-2
            text-white bg-indigo-600 hover:bg-indigo-700 border border-indigo-600
            hover:scale-105 transition delay-150 duration-300 ease-in-out">
            Dodaj do koszyka
          </a>
        </div>

        <!-- Additional product info -->
        <div class="mt-6 border-t pt-6">
          <h3 class="text-lg font-semibold">Szczegóły</h3>
          <ul class="text-gray-700 text-sm space-y-2 mt-2">
            <li><strong>EAN:</strong> {{ $product->ean }}</li>
            <li><strong>SKU:</strong> {{ $product->sku }}</li>
            <li><strong>MPN:</strong> {{ $product->mpn }}</li>
            <li><strong>Kategoria:</strong>
              <a href="{{ route('web.categories', $product->category->slug) }}" class="text-indigo-600 hover:underline">
                {{ $product->category->title }}
              </a>
            </li>
            <li><strong>Marka:</strong>
              <a href="{{ route('web.brands', $product->brand->slug) }}" class="text-indigo-600 hover:underline">
                {{ $product->brand->title }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Related products -->
    <div class="mt-16 bg-[var(--webPrimaryTabBackgroundColour)] p-8 rounded-2xl shadow-md">
      <h2 class="text-2xl font-bold mb-6">Podobne produkty</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
{{--        @foreach ($relatedProducts as $related)--}}
{{--          <x-product-card :product="$related" :url="$related->getFirstMediaUrl('products') ?? asset('images/sample.webp')" />--}}
{{--        @endforeach--}}
      </div>
    </div>

  </div>
</x-layouts.web>
