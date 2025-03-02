@php
  use App\Helpers\BreadcrumbItem;

  $items = [
    BreadcrumbItem::make('Produkty', route('web.products.index')),
    BreadcrumbItem::make($product->title),
  ];
@endphp

<x-layouts.web-page-card :title="'Produkty - ' . $product->title" class="flex-col gap-16">
  <x-slot:top>
    <x-web.breadcrumbs :items="$items" />
  </x-slot:top>

  <!-- Product section -->
  <x-web.card-full>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">

      <!-- Product image -->
      <div class="w-full rounded-xl shadow-md">
        <img src="{{ $product->getFirstMediaUrl('product_photo') ?: asset('images/sample.webp') }}"
          alt="{{ $product->title }}"
          class="w-full max-h-[600px] object-cover p-2"
        />
      </div>

      <!-- Product details -->
      <div class="flex flex-col gap-6">
        <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)]">{{ $product->title }}</h1>

        <p class="text-[var(--webHeaderTextColour)] text-lg">{{ $product->description }}</p>

        <div class="flex items-center gap-4">
          <span class="text-2xl font-bold text-[var(--webThirdLightTextColour)]">
            {{ round($product->discount_price ?? $product->price_gross, 2) }} zł
          </span>
          @if($product->discount_price)
            <span class="text-[var(--webHeaderTextColour)] line-through">
              {{ round($product->price_gross, 2) }} zł
            </span>
          @endif
        </div>

        <div class="flex items-center gap-4">
          <span class="text-sm text-[var(--webHeaderTextColour)]">
            Dostępność:
            <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
              {{ $product->stock > 0 ? 'Dostępny' : 'Brak na stanie' }}
            </span>
          </span>
        </div>

        <div class="flex max-sm:flex-col gap-4" x-data>
          <x-form-input.input
            type="number"
            class="max-sm:w-full w-[110px] text-center"
            x-ref="quantityInput"
            value="1"
            min="0"
            max="{{ $product->stock }}"
            step="1"
            :web="true"
            :disabled="$product->stock <= 0"
          />

          <x-web.primary-button
            class="max-sm:w-full text-center"
            @click="Livewire.dispatch('addToCart', { productId: {{ $product->id }}, amount: $refs.quantityInput.value })"
            :disabled="$product->stock <= 0"
          >
            <span class="w-full">Dodaj do koszyka</span>
          </x-web.primary-button>
        </div>


        <!-- Additional product info -->
        <div class="mt-6 border-t pt-6">
          <h3 class="text-lg font-semibold">Szczegóły</h3>
          <ul class="text-[var(--webHeaderTextColour)] text-sm space-y-2 mt-2">
            @if($product->ean)
              <li><strong>EAN:</strong> {{ $product->ean }}</li>
            @endif
            @if($product->sku)
              <li><strong>SKU:</strong> {{ $product->sku }}</li>
            @endif
            @if($product->mpn)
              <li><strong>MPN:</strong> {{ $product->mpn }}</li>
            @endif
            @if($product->category_id)
              <li><strong>Kategoria:</strong>
                <a wire:navigate href="{{ route('web.categories.show', $product->category->slug) }}"
                  class="text-[var(--webLightHoverColour)] hover:text-[var(--webThirdLightTextColour)]"
                >
                  {{ $product->category->title }}
                </a>
              </li>
            @endif
            @if($product->brand_id)
              <li><strong>Marka:</strong>
                <a href="{{ route('web.brands.show', $product->brand->slug) }}" wire:navigate class="text-[var(--webLightHoverColour)] hover:text-[var(--webThirdLightTextColour)]">
                  {{ $product->brand->title }}
                </a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </x-web.card-full>

  @if ($relatedProducts->isNotEmpty())
    <!-- Related products -->
    <x-web.card-full title="Podobne produkty">
      <x-web.products-bar :products="$relatedProducts" class="xl:grid-cols-3" />
    </x-web.card-full>
  @endif
</x-layouts.web-page-card>
