<x-layouts.web title="Produkty">
  <div class="container mx-auto px-4 py-10 lg:py-16">

    <!-- Breadcrumbs -->
    <nav class="text-sm mb-6 text-gray-600">
      <a href="{{ route('web.homepage') }}" class="hover:underline" wire:navigate>Strona główna</a> /
      <span class="text-gray-900">Produkty</span>
    </nav>

    <div class="bg-[var(--webPrimaryTabBackgroundColour)] p-8 rounded-2xl shadow-md mb-16">
      <!-- Page title -->
      <h1 class="text-3xl font-bold text-gray-900 mb-6">Nasze produkty</h1>

      <!-- Products list -->
      <livewire:web.products-list />

    </div>

  </div>
</x-layouts.web>
