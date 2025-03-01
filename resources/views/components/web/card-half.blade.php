@props(['title' => null])
<div class="w-full h-fit lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
  @if($title)
    <h2 class="text-2xl font-bold text-center mb-6 text-[--webPrimaryTextColour]">{{ $title }}</h2>
  @endif
  {{ $slot }}
</div>
