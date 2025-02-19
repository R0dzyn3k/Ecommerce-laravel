@props([
    'class' => null,
    'web' => false,
])

@php
  if (! $class) {
      $class = $web ? 'text-[var(--webHeaderTextColour)] hover:text-[var(--webThirdLightTextColour)] hover:bg-[--webPrimaryBackgroundColour]' : 'text-gray-800 hover:bg-gray-200 hover:text-black';
  }
@endphp

<a {{ $attributes->merge(['class' => "block w-full px-4 py-2 text-start leading-5 $class"]) }}>
  {{ $slot }}
</a>
