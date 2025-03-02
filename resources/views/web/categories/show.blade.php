@php
  use App\Helpers\BreadcrumbItem;

  $items = [
    BreadcrumbItem::make('Kategorie', route('web.categories.index')),
    BreadcrumbItem::make($category->title),
  ];
@endphp

<x-layouts.web-page-card :title="'Kategorie - ' . $category->title"  class="flex-col gap-16">
  <x-slot:top>
    <x-web.breadcrumbs :items="$items" />
  </x-slot:top>

  <!-- Category details -->
  <x-web.card-full>
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
  </x-web.card-full>

  @if($products->isNotEmpty())
    <!-- Products by Category -->
    <x-web.card-full title="Produkty kategorii">
      <x-web.products-bar :products="$products" class="xl:grid-cols-3" />
    </x-web.card-full>
  @endif
</x-layouts.web-page-card>
