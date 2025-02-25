@props(['title' => '', 'menuItems' => []])

<x-layouts.web-page :title="$title">
  <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
    <div class="w-full lg:w-1/3 max-lg:border-b lg:border-r border-[var(--webSecondaryLightTextColour)] pb-8 lg:pb-0">
      @include('components.layouts.sub-menu' , ['menuItems' => $menuItems, 'web' => true])
    </div>

    <div class="w-full lg:w-2/3">
      {{ $slot }}
    </div>
  </div>
</x-layouts.web-page>
