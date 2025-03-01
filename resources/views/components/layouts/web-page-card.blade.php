@props([
    'title' => '',
    'top' => null,
    'bottom' => null,
])

<x-layouts.web :title="$title">
  <div class="container mx-auto px-4 lg:px-0 py-16">

    @if($top)
      {{ $top }}
    @endif

    <div class="flex justify-center p-8">
      {{ $slot }}
    </div>

    @if($bottom)
      {{ $bottom }}
    @endif
  </div>
</x-layouts.web>
