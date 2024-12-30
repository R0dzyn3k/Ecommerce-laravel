<a
  class="flex items-center justify-center flex-col p-8 gap-1 w-[100px] h-[100px] hover:bg-[var(--adminSubMenuBackground)] @if($isCurrentPage) bg-[var(--adminSubMenuBackground)] @endif {{ $class }}"
  href="{{ $action }}"
  @if($title ?? $label) title="{{ $title ?? $label }}" @endif
  wire:navigate
>
  @if ($icon)
    <div class="flex items-center justify-center w-full h-full fill-current">
      @include('components.icons.' . $icon, ['attributes' => ''])

    </div>
  @endif

  @if($label)
    <span>{{ $label }}</span>
  @endif
</a>
