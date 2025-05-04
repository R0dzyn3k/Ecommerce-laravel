@props([
    'route' => null,
    'number' => '',
    'disabled' => false,
])

@php
    $isActive = request()->routeIs($route);
@endphp

<a
  @if (!$disabled && ! $isActive) href="{{ route($route) }}" wire:navigate @endif
  class="group {{ $disabled ? 'pointer-events-none cursor-default text-gray-400' : '' }}"
>
  <div class="mx-auto w-10 h-10 rounded-full border
    {{ $isActive ? 'border-[var(--webThirdLightTextColour)] bg-[var(--webThirdLightTextColour)]' : 'border-[var(--webLightHoverColour)] bg-[var(--webLightHoverColour)]' }}
    {{ $disabled && ! $isActive
        ? 'border-gray-300 bg-gray-300 '
        : 'group-hover:border-[var(--webThirdLightTextColour)] group-hover:bg-[var(--webThirdLightTextColour)] group-focus:border-[var(--webThirdLightTextColour)] group-focus:bg-[var(--webThirdLightTextColour)] '
    }}  text-[var(--webPrimaryLightTextColour)] transition duration-300 ease-in-out flex justify-center items-center"
  >
    {{ $number }}
  </div>

  <div class="text-[var(--webPrimaryTextColour)] text-center font-medium
                {{ $disabled && ! $isActive ? 'text-gray-400' : 'group-hover:text-[var(--webThirdLightTextColour)]' }}">
    {{ $slot }}
  </div>
</a>
