<x-layouts.web-page :title="$product->title">
  <x-slot:breadcrumbs>
    <a href="{{ route('web.products.index') }}" class="hover:underline" wire:navigate>Produkty</a> /
    <span class="text-[var(--webPrimaryTextColour)]]">{{ $product->title }}</span>
  </x-slot:breadcrumbs>

  <!-- Product section -->
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
      <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)]]">{{ $product->title }}</h1>

      <p class="text-[var(--webHeaderTextColour)] text-lg">{{ $product->description }}</p>

      <div class="flex items-center gap-4">
        <span class="text-2xl font-bold text-[var(--webThirdLightTextColour)]">
          {{ number_format($product->discount_price ?? $product->price, 2) }} zł
        </span>
        @if($product->discount_price)
          <span class="text-[var(--webHeaderTextColour)] line-through">
            {{ number_format($product->price, 2) }} zł
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

      <div class="flex gap-4">
        <x-web.primary-button :disabled="$product->stock <= 0">
          Dodaj do koszyka
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

  @if ($relatedProducts->isNotEmpty())
    <!-- Related products -->
    <x-slot:bottom>
      <x-web.products-bar :products="$relatedProducts" title="Podobne produkty" class="mt-16" />
    </x-slot:bottom>
  @endif
</x-layouts.web-page>
