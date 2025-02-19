@props(['contact'])

<div class="flex flex-col items-center md:items-start bg-[var(--webPrimaryTabBackgroundColour)] text-[var(--webPrimaryTextColour)] p-8 rounded-xl shadow-md max-w-full w-2/3 max-md:w-full">
  <h3 class="text-3xl font-bold mb-6 gap-2 w-fit">
    Skontaktuj się z nami
  </h3>

  <div class="w-fit">
  @foreach ($contact as $item)
    <div class="flex items-center md:items-start gap-3 mb-4">
      @svg($item['icon'], ['class' => 'w-6 h-6 text-[var(--webPrimaryTextColour)]'])
      <p class="text-lg">
        <strong>{{ $item['label'] }}:</strong>
        @if(isset($item['link']))
          <a href="{{ $item['link'] }}" class="hover:text-[var(--webThirdLightTextColour)]">{{ $item['value'] }}</a>
        @else
          {{ $item['value'] }}
        @endif
      </p>
    </div>
  @endforeach
    </div>
</div>
