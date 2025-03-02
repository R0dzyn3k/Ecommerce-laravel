<x-layouts.web-page-card title="Koszyk">
  <x-slot:top>
    <x-web.breadcrumbs :items="[\App\Helpers\BreadcrumbItem::make('Koszyk')]" />
  </x-slot:top>

  <!-- Order items list -->
  <livewire:web.cart />
</x-layouts.web-page-card>
