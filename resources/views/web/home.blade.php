<x-layouts.web title="Strona główna">
  <!-- Hero section -->
  @include('components.web.hero')

  <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16 py-16 px-4 lg:px-0">
    <!-- Product of the day -->
    <div class="col-span-2 lg:col-span-1">
      <livewire:web.product-of-the-day />
    </div>

    <!-- Featured Products -->
    <div class="col-span-2">
      <x-web.card-full title="Polecane produkty">
        <livewire:web.featured-products />
      </x-web.card-full>
    </div>
  </div>

  <!-- Banner -->
  <div class="w-full mx-full flex min-h-[300px]">
    <img src="{{ asset('images/banner.webp') }}" alt="banner" class="w-auto object-cover max-h-[400px] mx-auto" />
  </div>

  <!-- New Products -->
  <div class="container mx-auto px-4 lg:px-0 py-16">
    <livewire:web.new-products />
  </div>

  <!-- Blog -->
  <div class="container mx-auto px-4 lg:px-0">
    <livewire:web.blog-list />
  </div>

  <!-- Newsletter -->
  <livewire:web.newsletter />

</x-layouts.web>
