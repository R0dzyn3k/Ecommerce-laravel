<x-layouts.web-page :title="$brand->title">
  <!-- Breadcrumbs -->
  <x-slot:breadcrumbs>
    <a href="{{ route('web.brands.index') }}" class="hover:underline" wire:navigate>Marki</a> /
    <span class="text-[var(--webPrimaryTextColour)]">{{ $brand->title }}</span>
  </x-slot:breadcrumbs>

  <!-- Brand details -->
  <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
    <img
      src="{{ $brand->getFirstMediaUrl('brand_photo', 'thumbnail') ?: asset('images/sample.webp') }}"
      alt="{{ $brand->title }}"
      class="w-48 h-48 object-cover rounded-xl shadow-md"
    >
    <div class="flex-1">
      <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-4">{{ $brand->title }}</h1>
      <p class="text-[var(--webHeaderTextColour)]">{{ $brand->description }}</p>
    </div>
  </div>

  <!-- Products by Brand -->
  <x-slot:bottom>
    @if($products->isNotEmpty())
      <x-web.products-bar :products="$products" title="Produkty marki {{ $brand->title }}" class="mt-16" />
    @else
      <p class="text-[var(--breadcrumbsColour)]">Brak produktów tej marki.</p>
    @endif
  </x-slot:bottom>
</x-layouts.web-page>
