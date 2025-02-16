@props(['links'])

@php
  $links = [
    ['route' => 'web.homepage.index', 'label' => 'Strona główna'],
    ['route' => 'web.products.index', 'label' => 'Produkty'],
    ['route' => 'web.categories.index', 'label' => 'Kategorie'],
    ['route' => 'web.brands.index', 'label' => 'Marki'],
    ['route' => 'web.contact.index', 'label' => 'Kontakt'],
  ];
@endphp

<nav x-data="{ showSubBar: true, lastScrollY: window.scrollY }"
  x-init="window.addEventListener('scroll', () => {
        if (window.scrollY > lastScrollY) {
            showSubBar = false;
        } else {
            showSubBar = true;
        }
        lastScrollY = window.scrollY;
     })"
  class="fixed top-0 left-0 w-full bg-[var(--webPrimaryTabBackgroundColour)] shadow-lg z-50">

  <!-- Top bar -->
  <div class="border-b border-gray-300 relative z-30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20 bg-[var(--webHeaderBackgroundColour)]">
      <div class="flex justify-between h-16">
        <div class="flex-shrink-0 flex items-center">
          <a href="{{ route('web.homepage.index') }}" class="text-2xl font-bold text-[--webThirdLightTextColour]">
            {{ config('app.name', 'E-sklep') }}
          </a>
        </div>
        <div class="flex-1 flex items-center justify-center px-10 max-w-[800px]">
          @livewire('web.search-bar')
        </div>
        <div class="flex items-center">
          <a href="{{ route('web.cart.index') }}" class="p-2 text-[var(--webHeaderTextColour)] hover:text-[var(--webLightHoverColour)] text-lg font-semibold">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </a>
          <a href="{{ route('web.profile.index') }}" class="ml-4 p-2 text-[var(--webHeaderTextColour)] hover:text-[var(--webLightHoverColour)] text-lg font-semibold">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom bar -->
  <div x-show="showSubBar"
    x-transition:enter="transform transition ease-in-out duration-300"
    x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
    x-transition:leave="transform transition ease-in-out duration-300"
    x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full"
    class="fixed top-16 left-0 w-full bg-[var(--webHeaderBackgroundColour)] shadow-md border-b border-gray-300 z-10">
    <div class="container mx-auto flex justify-start space-x-6 px-6 py-2">
      @foreach ($links as $link)
        @include('components.web.nav-link', ['route' => $link['route'], 'label' => $link['label']])
      @endforeach
    </div>
  </div>
</nav>
