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
      <livewire:web.featured-products />
    </div>
  </div>

  <!-- Banner -->
  <div class="mx-full flex">
    <img src="{{ asset('images/banner.webp') }}" alt="banner" class="w-full h-full object-cover max-h-[400px] bg-cover bg-center" />
  </div>

  <!-- New Products -->
  <div class="container mx-auto flex gap-16 px-4 lg:px-0 py-16">
    <livewire:web.new-products />
  </div>

  <!-- Blog -->
  @include('components.web.blog')

  <!-- Newsletter -->
  <livewire:web.newsletter />

</x-layouts.web>
