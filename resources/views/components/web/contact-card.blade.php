@props(['contact'])

<div class="bg-[var(--webPrimaryTabBackgroundColour)] text-[var(--webPrimaryTextColour)] p-8 rounded-xl shadow-md max-w-full w-2/3 mx-4 lg:mx-0">
  <h3 class="text-3xl font-bold mb-6 flex items-center gap-2">
    Skontaktuj się z nami
  </h3>

  @foreach ($contact as $item)
    <div class="flex items-center gap-3 mb-4">
      @svg($item['icon'], ['class' => 'w-6 h-6 text-[var(--webPrimaryTextColour)]'])
      <p class="text-lg">
        <strong>{{ $item['label'] }}:</strong>
        @if(isset($item['link']))
          <a href="{{ $item['link'] }}" class="hover:text-[var(--webThirdLightTextColour)] transition-colors">{{ $item['value'] }}</a>
        @else
          {{ $item['value'] }}
        @endif
      </p>
    </div>
  @endforeach
</div>
