@props(['title' => null])

<div class="w-full h-fit lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md">
  @if($title)
    <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6 text-center ">{{ $title }}</h2>
  @endif
  {{ $slot }}
</div>
