@props(['links'])

@php
  $links = [
    ['route' => 'web.homepage', 'label' => 'Strona główna'],
    ['route' => 'web.products', 'label' => 'Produkty'],
    ['route' => 'web.categories', 'label' => 'Kategorie'],
    ['route' => 'web.brands', 'label' => 'Marki'],
    ['route' => 'web.contact', 'label' => 'Kontakt'],
  ];
@endphp

<nav x-data="{ showSubBar: true, lastScrollY: window.scrollY, mobileMenu: false }"
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
          <a href="{{ route('web.homepage') }}" wire:navigate class="text-2xl font-bold text-[--webThirdLightTextColour]">
            {{ config('app.name', 'E-sklep') }}
          </a>
        </div>

        <!-- Desktop search bar -->
        <div class="hidden md:flex flex-1 items-center justify-center px-10 max-w-[800px]">
          @livewire('web.search-bar')
        </div>

        <div class="flex items-center">
          <!-- Cart -->
          <a href="{{ route('web.cart') }}" wire:navigate class="p-2 text-[var(--webHeaderTextColour)] hover:text-[var(--webLightHoverColour)] text-lg font-semibold">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </a>
          <!-- Profile -->
          <x-dropdown align="right" contentClasses="py-2 bg-white">
            <x-slot name="trigger">
              <button class="flex items-center justify-center w-full h-full focus:outline-none p-6 text-[var(--webHeaderTextColour)] hover:text-[var(--webLightHoverColour)]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </button>
            </x-slot>

            <x-slot name="content">
              @if (auth()->guard('web')->check())
                <!-- Customer -->
                <x-dropdown-link :href="route('web.profile.edit')" wire:navigate web="true">
                  {{ __('pages.profile.title') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('web.logout')" wire:navigate web="true">
                  {{ __('auth.logout') }}
                </x-dropdown-link>

              @else
                <!-- Guest -->
                <x-dropdown-link :href="route('web.login')" wire:navigate web="true">
                  {{ __('auth.logIn') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('web.register')" wire:navigate web="true">
                  {{ __('pages.register') }}
                </x-dropdown-link>
              @endif
            </x-slot>
          </x-dropdown>


          <!-- Hamburger menu (Mobile) -->
          <button @click="mobileMenu = !mobileMenu" class="ml-4 p-2 md:hidden">
            <svg class="h-6 w-6 text-[var(--webHeaderTextColour)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom bar - Desktop -->
  <div x-show="showSubBar" class="hidden md:block fixed top-16 left-0 w-full bg-[var(--webHeaderBackgroundColour)] shadow-md border-b border-gray-300 z-10">
    <div class="container mx-auto flex justify-start space-x-6 px-6 py-2">
      @foreach ($links as $link)
        @include('components.web.nav-link', ['route' => $link['route'], 'label' => $link['label']])
      @endforeach
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="md:hidden fixed top-16 left-0 w-full bg-[var(--webHeaderBackgroundColour)] shadow-md border-b border-gray-300 z-10">

    <!-- Search bar przeniesiony do hamburgera -->
    <div class="p-4">
      @livewire('web.search-bar')
    </div>

    <div class="flex flex-col space-y-2 p-4">
      @foreach ($links as $link)
        @include('components.web.nav-link', ['route' => $link['route'], 'label' => $link['label']])
      @endforeach
    </div>
  </div>

</nav>
