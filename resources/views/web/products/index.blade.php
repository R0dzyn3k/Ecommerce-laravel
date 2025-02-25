<x-layouts.web-page title="Produkty">
    <!-- Breadcrumbs -->
    <x-slot:breadcrumbs>
      <span class="text-[var(--webPrimaryTextColour)]]">Produkty</span>
    </x-slot:breadcrumbs>

    <!-- Page title -->
    <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)]] mb-6">Nasze produkty</h1>

    <!-- Products list -->
    <livewire:web.products-list />
</x-layouts.web-page>
