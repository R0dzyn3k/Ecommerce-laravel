<x-layouts.web title="Strona główna">
  <!-- Hero section -->
  @include('components.web.hero')

  <div class="container mx-auto flex flex-col lg:flex-row gap-16 py-16 px-4 lg:px-0">
    <!-- Product of the day -->
    <livewire:web.product-of-the-day />

    <!-- Featured Products -->
    <div class="w-full lg:w-2/3 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
      <div class="h-96 flex">
        <h3 class="text-2xl font-bold text-gray-800">Polecane produkty</h3>
      </div>
    </div>
  </div>

  <!-- New Products -->
  <div class="container mx-auto flex gap-16 px-4 lg:px-0">
    <div class="w-full bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
      <div class="h-96 flex">
        <h3 class="text-2xl font-bold text-gray-800">Nowe produkty</h3>
      </div>
    </div>
  </div>

  <!-- Banner -->
  <div class="mx-full py-16 flex">
    <img src="{{ asset('images/banner.webp') }}" alt="banner" class="w-full h-full object-cover max-h-[400px] bg-cover bg-center" />
  </div>

  <!-- Blog -->
  @include('components.web.blog')

  <!-- Newsletter -->
  <livewire:web.newsletter />

</x-layouts.web>
