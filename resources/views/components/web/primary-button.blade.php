@props([
  'disabled' => false,
  'type' => 'submit',
])

@php
  $customClasses = $attributes->get('class');
@endphp

<button
  {{ $attributes->merge([
    'class' => 'font-semibold uppercase text-nowrap tracking-widest  text-[var(--webPrimaryLightTextColour)] ' .
    'px-4 py-2 rounded-md inline-flex items-center border border-[var(--webLightHoverColour)] hover:border-[var(--webThirdLightTextColour)] ' .
    'bg-[var(--webLightHoverColour)] hover:bg-[var(--webThirdLightTextColour)] disabled:bg-gray-500 focus:ring-2 transition duration-300 ease-in-out',
  ]) }}
  @disabled($disabled)
  type="{{ $type }}"
>
  {{ $slot }}
</button>
