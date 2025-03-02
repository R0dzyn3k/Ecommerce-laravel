@props([
    'title' => '',
    'top' => null,
    'bottom' => null,
])

<x-layouts.web :title="$title">
  <div class="container mx-auto px-4 lg:px-0 py-16 mt-6 relative">

    @if($top)
      {{ $top }}
    @endif

    <div {{ $attributes->merge(['class' => 'flex justify-center' ])}} >
      {{ $slot }}
    </div>

    @if($bottom)
      {{ $bottom }}
    @endif
  </div>
</x-layouts.web>
