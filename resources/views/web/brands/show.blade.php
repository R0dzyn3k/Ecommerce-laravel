@php
  use App\Helpers\BreadcrumbItem;

  $items = [
    BreadcrumbItem::make('Marki', route('web.brands.index')),
    BreadcrumbItem::make($brand->title),
  ];
@endphp

<x-layouts.web-page-card :title="'Marki - ' . $brand->title" class="flex-col gap-16">
  <x-slot:top>
    <x-web.breadcrumbs :items="$items" />
  </x-slot:top>

  <!-- Brand details -->
  <x-web.card-full>
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
  </x-web.card-full>

  @if($products->isNotEmpty())
    <!-- Products by Brand -->
    <x-web.card-full title="Produkty marki">
      <x-web.products-bar :products="$products" class="xl:grid-cols-3" />
    </x-web.card-full>
  @endif
</x-layouts.web-page-card>
