@props([
    'title' => null,
    'titleBefore' => null,
    'toolbox' => null,
])

<x-layouts.app :title="$title">
  <div class="relative flex flex-row w-full h-[100dvh] text-[var(--adminTextColour)]">

    <!-- Left menu panel -->
    <div class="grid grid-rows-[100px_auto_100px] w-[100px] min-h-full bg-[var(--adminMenuBackground)]">
      <livewire:admin.components.link-button action="{{ route('admin.dashboard') }}" icon="logo" :title="__('pages.dashboard')" class="bg-[var(--themePrimaryColour)] hover:bg-[var(--themePrimaryColour)]" />
      <livewire:admin.menu />
      <livewire:admin.components.link-button action="{{ route('admin.settings') }}" icon="settings" :label="__('pages.settings.title')" :title="__('pages.settings.title')" class="border-t border-[var(--adminMainBackground)]" />
    </div>

    <!-- Right -->
    <div class="flex flex-col w-full h-full">

      <!-- Header -->
      <div class="relative bg-[var(--adminMenuBackground)] grid grid-cols-[250px_auto_100px] items-center shadow-md shadow-[var(--adminMenuBackground)]">
        <div></div>
        <div class="p-6">
          <h1 class="text-2xl font-bold">
            {{ $title . ($titleBefore ? "- $titleBefore" : '') }}
          </h1>
        </div>

        <x-dropdown align="right" contentClasses="py-2 bg-white">
          <x-slot name="trigger">
            <button class="flex items-center justify-center w-full h-full focus:outline-none p-6 fill-white">
              <x-icon name="user" />
            </button>
          </x-slot>

          <x-slot name="content">
            <x-dropdown-admin-link :href="route('admin.profile')" wire:navigate>
              {{ __('pages.profile.title') }}
            </x-dropdown-admin-link>
            <x-dropdown-admin-link :href="route('admin.auth.logout')" wire:navigate>
              {{ __('auth.logout') }}
            </x-dropdown-admin-link>
          </x-slot>
        </x-dropdown>

      </div>

      <!-- Bottom -->
      <div class="relative flex-1 overflow-auto bg-[var(--adminMainBackground)]">
        <div class="grid grid-cols-[250px_auto] h-full">
          <!-- Left Submenu -->
          <div class="flex-none flex flex-col p-6 w-[250px] min-h-full bg-[var(--adminSubMenuBackground)]">
            <livewire:admin.sub-menu />
          </div>

          <!-- Page content -->
          <div class="flex flex-1 p-6 flex-col overflow-auto">
            {{ $slot }}
          </div>
        </div>

        <!-- Alert Section -->
        <x-alert-message />
      </div>

    </div>
  </div>
</x-layouts.app>