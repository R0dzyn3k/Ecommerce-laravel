<x-layouts.web-page-card title="Kategorie">
  <x-slot:top>
    <x-web.breadcrumbs :items="[\App\Helpers\BreadcrumbItem::make('Kategorie')]" />
  </x-slot:top>

  <!-- Categories grid -->
  <x-web.card-full title="Nasze kategorie">
    <x-web.items-grid-four>
      @foreach ($categories as $category)
        <div class="flex flex-col items-center text-center">
          <a href="{{ route('web.categories.show', $category->slug) }}" wire:navigate class="group">
            <img
              src="{{ $category->getFirstMediaUrl('category_photo', 'thumbnail') ?: asset('images/sample.webp') }}"
              alt="{{ $category->title }}"
              class="w-32 h-32 object-cover rounded-xl mb-4 transition-transform group-hover:scale-110 mx-auto"
            >

            <h3 class="text-xl font-semibold">{{ $category->title }}</h3>
          </a>
        </div>
      @endforeach
    </x-web.items-grid-four>

  <div class="mt-10">
    {{ $categories->links('components.paginate') }}
  </div>
  </x-web.card-full>
</x-layouts.web-page-card>
