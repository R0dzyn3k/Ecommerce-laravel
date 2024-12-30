<a
  class="flex flex-col p-2 gap-1 hover:bg-[var(--adminMainBackground)] @if($isCurrentPage) bg-[var(--adminMainBackground)] @endif {{ $class }}"
  href="{{ $action }}"
  @if($title ?? $label) title="{{ $title ?? $label }}" @endif
  wire:navigate
>
  @if($label)
    <span>{{ $label }}</span>
  @endif
</a>
