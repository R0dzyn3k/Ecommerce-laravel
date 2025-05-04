@props(['title' => null])

<div class="w-full h-fit bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md relative" {{ $attributes }}>
  @if($title)
    <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6">{{ $title }}</h2>
  @endif
  {{ $slot }}
</div>
