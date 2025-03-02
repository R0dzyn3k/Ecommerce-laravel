<x-layouts.web-page-card title="Produkty">
  <x-slot:top>
    <x-web.breadcrumbs :items="[\App\Helpers\BreadcrumbItem::make('Produkty')]" />
  </x-slot:top>

    <!-- Products list -->
    <livewire:web.products-list title="Nasze produkty"/>
</x-layouts.web-page-card>
