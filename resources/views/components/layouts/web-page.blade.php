@props([
    'title' => '',
    'breadcrumbs' => null,
    'bottom' => null,
])

<x-layouts.web :title="$title">
  <div class="container mx-auto px-4 lg:px-0 py-16">

    @if($breadcrumbs)
      <!-- Breadcrumbs -->
      <nav class="text-sm mb-6 text-[var(--breadcrumbsColour)]">
        <a href="{{ route('web.homepage') }}" class="hover:underline" wire:navigate>Strona główna</a> /
        {{ $breadcrumbs }}
      </nav>
    @endif

    <div class="bg-[var(--webPrimaryTabBackgroundColour)] p-8 rounded-2xl shadow-md">
      {{ $slot }}
    </div>

    @if($bottom)
        {{ $bottom }}
    @endif
  </div>
</x-layouts.web>
