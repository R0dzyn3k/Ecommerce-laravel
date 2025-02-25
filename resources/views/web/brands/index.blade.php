<x-layouts.web-page title="Marki">
  <!-- Breadcrumbs -->
  <x-slot:breadcrumbs>
    <span class="text-[var(--webPrimaryTextColour)]]">Marki</span>
  </x-slot:breadcrumbs>

  <!-- Page title -->
  <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)]] mb-6">Nasze marki</h1>

  <!-- Brands grid -->

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
    @foreach ($brands as $brand)
      <div class="flex flex-col items-center text-center">
        <a href="{{ route('web.brands.show', $brand->slug) }}" wire:navigate class="group">
          <img
            src="{{ $brand->getFirstMediaUrl('brand_photo', 'thumbnail') ?: asset('images/sample.webp') }}"
            alt="{{ $brand->title }}"
            class="w-32 h-32 object-cover rounded-xl mb-4 transition-transform group-hover:scale-110 mx-auto"
          >
          <h2 class="text-xl font-semibold">{{ $brand->title }}</h2>
        </a>
      </div>
    @endforeach
  </div>
</x-layouts.web-page>
