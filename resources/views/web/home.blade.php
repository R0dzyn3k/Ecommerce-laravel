<x-layouts.web title="Strona główna">
  <!-- Hero section -->
  @include('components.web.hero')

  <div class="container mx-auto flex flex-col lg:flex-row gap-16 py-16 px-4 lg:px-0">
    <!-- Product of the day -->
    <livewire:web.product-of-the-day />

    <!-- Featured Products -->
    <livewire:web.featured-products />
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
