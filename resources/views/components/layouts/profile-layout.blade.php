@props(['title' => '', 'menuItems' => []])

<x-layouts.web :title="$title">
  <div class="container mx-auto flex flex-col lg:flex-row pt-24 pb-16 px-4">
    <div class="w-full lg:w-1/3 bg-[var(--webPrimaryTabBackgroundColour)] max-lg:rounded-t-2xl lg:rounded-s-2xl max-lg:border-b border-black p-8 shadow-md">
      @include('components.layouts.sub-menu' , ['menuItems' => $menuItems, 'web' => true])
    </div>
    <div class="w-full lg:w-2/3 bg-[var(--webPrimaryTabBackgroundColour)] max-lg:rounded-b-2xl  lg:rounded-e-2xl p-8 shadow-md">
      {{ $slot }}
    </div>
  </div>
</x-layouts.web>
