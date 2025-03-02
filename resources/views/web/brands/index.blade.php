<x-layouts.web-page-card title="Marki">
  <x-slot:top>
    <x-web.breadcrumbs :items="[\App\Helpers\BreadcrumbItem::make('Marki')]" />
  </x-slot:top>

  <!-- Brands grid -->
  <x-web.card-full title="Nasze marki">
    <x-web.items-grid-four>
      @foreach ($brands as $brand)
        <div class="flex flex-col items-center text-center">
          <a href="{{ route('web.brands.show', $brand->slug) }}" wire:navigate class="group">
            <img
              src="{{ $brand->getFirstMediaUrl('brand_photo', 'thumbnail') ?: asset('images/sample.webp') }}"
              alt="{{ $brand->title }}"
              class="w-32 h-32 object-cover rounded-xl mb-4 transition-transform group-hover:scale-110 mx-auto"
            >

            <h3 class="text-xl font-semibold">{{ $brand->title }}</h3>
          </a>
        </div>
      @endforeach
    </x-web.items-grid-four>

    <div class="mt-10">
      {{ $brands->links('components.paginate') }}
    </div>
  </x-web.card-full>
</x-layouts.web-page-card>
