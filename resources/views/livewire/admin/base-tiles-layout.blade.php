@php use App\Helpers\SubMenuItem; @endphp
@props([
    'menuItems' => [],
])

<div>
  <div class="flex flex-wrap gap-6">
    @php /** @var SubMenuItem $menuItem */ @endphp
    @foreach($menuItems as $menuItem)
      <a
        href="{{ $menuItem->url }}" title="{{ $menuItem->title }}"
        class="h-[150px] w-[300px] bg-[var(--adminSubMenuBackground)] p-5 flex flex-col items-center"
        wire:navigate
      >
        <div class="w-[60px] h-[60px] fill-current">
          @if($menuItem->icon)
            @svg($menuItem->icon)
          @endif
        </div>
        <h3 class="pt-5 text-lg font-bold">{{ $menuItem->label }}</h3>
      </a>
    @endforeach
  </div>
</div>
