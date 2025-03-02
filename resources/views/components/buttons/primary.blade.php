@props([
    'web' => false,
    'class' => null,
    'labelClass' => null,
])

@php
  if (! $class) {
     $class = $web
     ? 'text-[var(--webPrimaryLightTextColour)] bg-[var(--webLightHoverColour)] hover:bg-[var(--webThirdLightTextColour)] focus:border-[var(--webThirdLightTextColour)] focus:bg-[var(--webThirdLightTextColour)]'
     : 'bg-gray-700 text-white text-sm hover:bg-gray-600 hover:bg-white focus:bg-gray-600 focus:bg-white active:bg-gray-900 active:bg-gray-300 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800';
  }

@endphp

<button {{ $attributes->merge(['type' => 'submit',
'class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold ' .
'text-xs uppercase tracking-widest focus:ring-2 ' . $class,
]) }}>
  {{ $slot }}
</button>
