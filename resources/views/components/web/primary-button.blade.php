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
    'px-4 py-2 rounded-md inline-flex items-center border border-[var(--webThirdLightTextColour)] hover:border-[var(--webLightHoverColour)] ' .
    'focus:border-[var(--webLightHoverColour)] focus:bg-[var(--webLightHoverColour)] focus:ring-2 ' .
    'bg-[var(--webThirdLightTextColour)] hover:bg-[var(--webLightHoverColour)] disabled:bg-gray-500 transition duration-300 ease-in-out',
  ]) }}
  @disabled($disabled)
  type="{{ $type }}"
>
  {{ $slot }}
</button>
