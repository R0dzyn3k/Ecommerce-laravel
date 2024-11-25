@props([
    'href' => '#',
    'iconName' => '',
])

<a href="{{ $href }}" class="flex-none w-[100px] h-[100px] flex items-center justify-center">
  <div class="p-6 fill-current flex-none w-full h-full hover:bg-[var(--adminSubMenuBackground)]">
    <x-icon :name="$iconName" />
  </div>
</a>
