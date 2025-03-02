<x-web.card-full :title="$title">
  <!-- Sorting -->
  <div class="flex gap-4 absolute top-14 right-0 p-8 sm:top-0 sm:ps-2 w-full sm:w-1/2 lg:w-1/4">
    <select wire:model.live="sortBy" class="border rounded-md px-4 py-2 w-full">
      <option value="title">Nazwa</option>
      <option value="price">Cena</option>
      <option value="created_at">Data dodania</option>
    </select>

    <x-web.primary-button wire:click="setSorting" >
      {{ $sortDirection === 'asc' ? '▲' : '▼' }}
    </x-web.primary-button>
  </div>

  <!-- Filters -->
    <div class="grid grid-cols-2 lg:grid-cols-10 gap-4 items-end flex-wrap pb-8 max-sm:mt-20">

      <!-- Category filter -->
      <select wire:model.live="categoryId" class="border rounded-md px-4 py-2 w-full  lg:col-span-2">
        <option value="">Kategorie</option>
        @foreach($categories as $id => $category)
          <option value="{{ $id }}">{{ $category }}</option>
        @endforeach
      </select>

      <!-- Brand filter -->
      <select wire:model.live="brandId" class="border rounded-md px-4 py-2 w-full  lg:col-span-2">
        <option value="">Marki</option>
        @foreach($brands as $id => $brand)
          <option value="{{ $id }}">{{ $brand }}</option>
        @endforeach
      </select>

      <!-- Price filters -->
      <input type="number" wire:model.live.debounce.500ms="priceFrom" placeholder="Cena od" class="border rounded-md px-4 py-2 w-full  lg:col-span-2">
      <input type="number" wire:model.live.debounce.500ms="priceTo" placeholder="Cena do" class="border rounded-md px-4 py-2 w-full  lg:col-span-2">

      <!-- Clear filters button -->
      <x-web.secondary-button wire:click="clearFilters" class="sm:w-fit lg:w-full col-span-2 ms-auto">
        Wyczyść
      </x-web.secondary-button>
    </div>

  <!-- Products grid -->
  <x-web.items-grid-three>
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
  </x-web.items-grid-three>

  <!-- Pagination -->
  <div class="mt-10">
    {{ $products->links('components.paginate') }}
  </div>
</x-web.card-full>
