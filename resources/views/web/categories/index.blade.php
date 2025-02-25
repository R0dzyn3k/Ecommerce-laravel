<x-layouts.web-page title="Kategorie">
  <!-- Breadcrumbs -->
  <x-slot:breadcrumbs>
    <span class="text-[var(--webPrimaryTextColour)]]">Kategorie</span>
  </x-slot:breadcrumbs>

  <!-- Page title -->
  <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)]] mb-6">Nasze kategorie</h1>

  <!-- Categories grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
    @foreach ($categories as $category)
      <div class="flex flex-col items-center text-center">
        <a href="{{ route('web.categories.show', $category->slug) }}" wire:navigate class="group">
          <img
            src="{{ $category->getFirstMediaUrl('category_photo', 'thumbnail') ?: asset('images/sample.webp') }}"
            alt="{{ $category->title }}"
            class="w-32 h-32 object-cover rounded-xl mb-4 transition-transform group-hover:scale-110 mx-auto"
          >
          <h2 class="text-xl font-semibold">{{ $category->title }}</h2>
        </a>
      </div>
    @endforeach
  </div>
</x-layouts.web-page>
