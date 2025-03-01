@php use App\Helpers\SubMenuItem; @endphp
@props([
  'menuItems' => [],
  'isChild' => false,
  'web' => false,
  'menuClass' => null,
  'linkClass' => null,
  'activeClass' => null,
])

@php

  if (! $menuClass) {
    $menuClass = $web ? 'rounded-2xl overflow-hidden ' : 'w-[250px]  bg-[var(--adminSubMenuBackground)]';
  }

  if (! $linkClass) {
    $linkClass = $web ? 'hover:bg-[var(--webPrimaryBackgroundColour)] p-3 hover:font-semibold border-b border-[var(--webSecondaryLightTextColour)]  text-lg' : 'hover:bg-[var(--adminMainBackground)] border-b border-[var(--adminMainBackground)]';
  }

if (! $activeClass) {
  $activeClass = $web ? 'bg-[var(--webPrimaryBackgroundColour)] font-semibold' : 'bg-[var(--adminMainBackground)]';
}
@endphp

<div class="flex-none flex flex-col  {{ $menuClass }}">
  @php /** @var SubMenuItem $menuItem */ @endphp
  @foreach($menuItems as $menuItem)
    <a
      class="flex flex-col gap-1 p-6 {{ $linkClass }} @if($menuItem->isActive()) {{ $activeClass }} @endif @if($web) last:border-none @endif"
      @if($menuItem->url) href="{{ $menuItem->url }}" @endif
      title="{{ $menuItem->title }}"
      wire:navigate
    >
      <span @if($isChild) class="ps-2" @endif>{{ $menuItem->label }}</span>
    </a>

    @if($menuItem->hasChildren())
      <x-layouts.sub-menu :menuItems="$menuItem->children" :isChild="true" />
    @endif
  @endforeach
</div>
