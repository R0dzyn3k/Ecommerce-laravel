@php
  $contactData = [
    ['label' => 'E-mail', 'value' => 'kontakt@eshop.pl', 'icon' => 'heroicon-c-envelope-open', 'link' => 'mailto:kontakt@eshop.pl'],
    ['label' => 'Telefon', 'value' => '+48 123 456 789', 'icon' => 'heroicon-c-phone', 'link' => 'tel:+48123456789'],
    ['label' => 'Adres', 'value' => 'ul. Kawiarska 15, 00-001 Warszawa', 'icon' => 'heroicon-c-map-pin'],
  ];
@endphp

<x-layouts.web title="Kontakt">
  <div class="container mx-auto flex flex-col md:flex-row pt-24 pb-16 px-4 gap-16 lg:px-0">
    <x-web.contact-card :contact="$contactData" />

    <div class="bg-[var(--webPrimaryTabBackgroundColour)] text-[var(--webHeaderTextColour)] p-8 rounded-xl shadow-md max-w-full w-1/3 max-md:hidden">
      <img src="{{ asset('storage/web/contact.svg') }}" alt="banner" class="h-full object-cover max-h-[400px] bg-cover bg-center w-fit m-auto" />
    </div>
  </div>

  <!-- Banner -->
  <div class="mx-full flex">
    <img src="{{ asset('storage/web/banner.webp') }}" alt="banner" class="w-full h-full object-cover max-h-[400px] bg-cover bg-center" />
  </div>

  <!-- Newsletter -->
  <livewire:web.newsletter />

</x-layouts.web>
