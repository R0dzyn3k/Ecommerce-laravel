@php
  $contactData = [
    ['label' => 'E-mail', 'value' => 'kontakt@eshop.pl', 'icon' => 'heroicon-c-envelope-open', 'link' => 'mailto:kontakt@eshop.pl'],
    ['label' => 'Telefon', 'value' => '+48 123 456 789', 'icon' => 'heroicon-c-phone', 'link' => 'tel:+48123456789'],
    ['label' => 'Adres', 'value' => 'ul. Kawiarska 15, 00-001 Warszawa', 'icon' => 'heroicon-c-map-pin'],
  ];
@endphp

<x-layouts.web title="Kontakt">
  <div class="container mx-auto px-4 lg:px-0 py-16 mt-6 relative">

    <x-web.breadcrumbs :items="[\App\Helpers\BreadcrumbItem::make('Kontakt')]" />

    <div class="flex flex-col md:flex-row gap-16">

      <x-web.contact-card :contact="$contactData" />

      <div class="bg-[var(--webPrimaryTabBackgroundColour)] p-8 rounded-2xl shadow-md max-w-full w-1/3 max-md:hidden">
        <img src="{{ asset('images/contact.svg') }}" alt="banner" class="h-full w-fit object-cover m-auto" />
      </div>
    </div>
  </div>

  <!-- Banner -->
  <div class="w-full mx-full flex min-h-[300px]">
    <img src="{{ asset('images/banner.webp') }}" alt="banner" class="w-auto object-cover max-h-[400px] mx-auto" />
  </div>

  <!-- Newsletter -->
  <livewire:web.newsletter />

</x-layouts.web>
