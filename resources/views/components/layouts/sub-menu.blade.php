@php use App\Helpers\SubMenuItem; @endphp
@props([
  'menuItems' => [],
  'isChild' => false,
])

<div class="flex-none flex flex-col  w-[250px] bg-[var(--adminSubMenuBackground)]">
  @php /** @var SubMenuItem $menuItem */ @endphp
  @foreach($menuItems as $menuItem)
    <a
      class="flex flex-col gap-1 hover:bg-[var(--adminMainBackground)] p-6 border-b border-[var(--adminMainBackground)] @if($menuItem->isActive()) bg-[var(--adminMainBackground)] @endif"
      href="{{ $menuItem->url }}"
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
