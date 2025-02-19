@props(['route', 'label'])

<a href="{{ route($route) }}" wire:navigate
  class="px-4 py-2 text-lg font-semibold transition-colors
          {{ request()->routeIs($route) ? 'font-bold text-[var(--webThirdLightTextColour)]' : 'text-[var(--webHeaderTextColour)] hover:text-[var(--webLightHoverColour)]' }}">
  {{ $label }}
</a>
