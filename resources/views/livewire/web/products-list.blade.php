<div>
  <!-- Filters -->
  <div class="mb-8 flex flex-col lg:flex-row gap-4 justify-between">
    <div class="flex gap-4 items-end flex-wrap">
      <!-- Category filter -->
      <select wire:model.live="categoryId" class="border rounded-md px-4 py-2">
        <option value="">Kategorie</option>
        @foreach($categories as $id => $category)
          <option value="{{ $id }}">{{ $category }}</option>
        @endforeach
      </select>

      <!-- Brand filter -->
      <select wire:model.live="brandId" class="border rounded-md px-4 py-2">
        <option value="">Marki</option>
        @foreach($brands as $id => $brand)
          <option value="{{ $id }}">{{ $brand }}</option>
        @endforeach
      </select>

      <!-- Price filters -->
      <input type="number" wire:model.live.debounce.500ms="priceFrom" placeholder="Cena od" class="border rounded-md px-4 py-2 w-32">
      <input type="number" wire:model.live.debounce.500ms="priceTo" placeholder="Cena do" class="border rounded-md px-4 py-2 w-32">

      <!-- Clear filters button -->
      <button wire:click="clearFilters" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300 focus:ring-2 transition duration-300 ease-in-out">
        Wyczyść filtry
      </button>
    </div>

    <!-- Sorting -->
    <div>
      <select wire:model.live="sortBy" class="border rounded-md px-4 py-2">
        <option value="title">Nazwa</option>
        <option value="price">Cena</option>
        <option value="created_at">Data dodania</option>
      </select>

      <x-web.primary-button wire:click="setSorting" class="">
        @if ($sortDirection === 'asc') ▲ @else ▼ @endif
      </x-web.primary-button>
    </div>
  </div>

  <!-- Products grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($products as $product)
      <x-web.product-tile
        :product="$product"
        :url="$product->getFirstMediaUrl('product_photo') ?: asset('images/sample.webp')"
        class="w-full"
      />
    @empty
      <div class="col-span-full text-center text-gray-500 py-8">
        Brak produktów spełniających kryteria.
      </div>
    @endforelse
  </div>

  <!-- Pagination -->
  <div class="mt-10">
    {{ $products->links() }}
  </div>
</div>
