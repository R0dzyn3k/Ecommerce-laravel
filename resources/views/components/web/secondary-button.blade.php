@props([
  'disabled' => false,
  'type' => 'submit',
])

@php
  $customClasses = $attributes->get('class');
@endphp

<button
  {{ $attributes->merge([
    'class' => 'font-semibold uppercase text-nowrap tracking-widest  text-white px-4 py-2 rounded-md ' .
    'items-center border border-gray-700 hover:border-gray-500 disabled:opacity-25 ' .
    'focus:bg-gray-500  focus:outline-none focus:ring-2 ' .
    'bg-gray-700 hover:bg-gray-500 disabled:bg-gray-500 focus:ring-2 transition duration-300 ease-in-out',
  ]) }}
  @disabled($disabled)
  type="{{ $type }}"
>
  {{ $slot }}
</button>
