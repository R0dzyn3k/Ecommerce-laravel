<x-layouts.web-page :title="$category->title">
  <!-- Breadcrumbs -->
  <x-slot:breadcrumbs>
    <a href="{{ route('web.categories.index') }}" class="hover:underline" wire:navigate>Kategorie</a> /
    <span class="text-[var(--webPrimaryTextColour)]">{{ $category->title }}</span>
  </x-slot:breadcrumbs>

  <!-- Category details -->
  <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
    <img
      src="{{ $category->getFirstMediaUrl('category_photo', 'thumbnail') ?: asset('images/sample.webp') }}"
      alt="{{ $category->title }}"
      class="w-48 h-48 object-cover rounded-xl shadow-md"
    >
    <div class="flex-1">
      <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-4">{{ $category->title }}</h1>
      <p class="text-[var(--webHeaderTextColour)]">{{ $category->description }}</p>
    </div>
  </div>

  <!-- Products by Category -->
  <x-slot:bottom>
    @if($products->isNotEmpty())
      <x-web.products-bar :products="$products" title="Produkty kategorii {{ $category->title }}" class="mt-16" />
    @else
      <p class="text-[var(--breadcrumbsColour)]">Brak produktów tej kategorii.</p>
    @endif
  </x-slot:bottom>
</x-layouts.web-page>
