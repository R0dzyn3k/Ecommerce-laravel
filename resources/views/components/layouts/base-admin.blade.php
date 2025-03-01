@props([
    'title' => null,
    'titleBefore' => null,
    'toolbox' => null,
    'showSidebar' => false,
    'sidebarMenuItems' => [],
])

<x-layouts.app :title="$title">
  <x-slot:styles>
    @rappasoftTableStyles
    @rappasoftTableThirdPartyStyles
  </x-slot:styles>

  <x-slot:scripts>
    @rappasoftTableScripts
    @rappasoftTableThirdPartyScripts
  </x-slot:scripts>

  <div class="relative flex flex-row w-full h-[100dvh] text-[var(--adminTextColour)]">

    <!-- Left menu panel -->
    <div class="grid grid-rows-[100px_auto_100px] w-[100px] min-h-full bg-[var(--adminMenuBackground)]">
      <livewire:admin.components.menu-item action="{{ route('admin.dashboard') }}" icon="logo" :title="__('pages.dashboard')" class="bg-[var(--themePrimaryColour)] hover:bg-[var(--themePrimaryColour)]" />
      <livewire:admin.components.menu />
      <livewire:admin.components.menu-item action="{{ route('admin.settings.index') }}" icon="settings" :label="__('pages.settings.title')" :title="__('pages.settings.title')" class="border-t border-[var(--adminMainBackground)]" />
    </div>

    <!-- Right -->
    <div class="flex flex-col w-full h-full">

      <!-- Header -->
      <div class="relative bg-[var(--adminMenuBackground)] grid {{ $showSidebar ? 'grid-cols-[250px_auto_100px]' : 'grid-cols-[auto_100px]'}} items-center shadow-md shadow-[var(--adminMenuBackground)]">
        @if ($showSidebar)
          <div></div>
        @endif
        <div class="p-6">
          <h1 class="text-3xl font-bold">
            {{ $title . ($titleBefore ? "- $titleBefore" : '') }}
          </h1>
        </div>

        <x-dropdown align="right" contentClasses="py-2 bg-white">
          <x-slot name="trigger">
            <button class="flex items-center justify-center w-full h-full focus:outline-none p-6 fill-white">
              @svg('heroicon-c-user-circle')
            </button>
          </x-slot>

          <x-slot name="content">
            <x-dropdown-link :href="route('admin.profile.edit')" wire:navigate>
              {{ __('pages.profile.title') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('admin.auth.logout')" wire:navigate>
              {{ __('auth.logout') }}
            </x-dropdown-link>
          </x-slot>
        </x-dropdown>

      </div>

      <!-- Center -->
      <div class="relative flex-1 overflow-auto bg-[var(--adminMainBackground)]">
        <div class="grid {{ $showSidebar ? 'grid-cols-[250px_auto]' : 'grid-cols-[auto]' }} h-full">
          <!-- Left Submenu -->
          @if ($showSidebar)
            <div class="flex-none flex flex-col  w-[250px] min-h-full bg-[var(--adminSubMenuBackground)]">
              @include('components.layouts.sub-menu' , ['menuItems' => $sidebarMenuItems])
            </div>
          @endif

          <!-- Page content -->
          <div class="flex flex-1 p-6 flex-col overflow-auto">
            {{ $slot }}
          </div>
        </div>

        <!-- Alert Section -->
        @include('components.alert-message')
      </div>

    </div>
  </div>
</x-layouts.app>
