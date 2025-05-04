@php
  use Illuminate\Support\Str;
@endphp

@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'autofocus' => null,
    'maxlength' => null,
    'rows' => 3,
    'web' => false,
    'class' => null,
    'labelClass' => null,
])

@php
  $id = $id ?? Str::random(8);
  $wireModel = $attributes->get('wire:model');

  if (! $class) {
   $class = $web ? 'bg-white border-gray-400' : 'border-gray-700 bg-gray-900 text-gray-300 mt-1';
  }

  if (! $labelClass) {
    $labelClass = $web ? 'text-[var(--webPrimaryTextColour)]' : 'text-gray-300';
  }
@endphp

<x-form-input.base
  class="block font-medium text-sm {{ $labelClass }}"
  :id="$id"
  :label="$label"
  :wireModel="$wireModel"
  :name="$name"
  web="{{ $web }}"
>
  <textarea
    id="{{ $id }}"
    @if($name) name="{{ $name }}" @endif
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($autofocus) autofocus="autofocus" @endif
  @if($maxlength) maxlength="{{ max((int) $maxlength, 0) }}" @endif
  @required($required)
  rows="{{ max((int) $rows, 1) }}"
    @disabled($disabled)
    @readonly($readonly)
    @readonly($readonly)
    {{ $attributes->merge([
        'class' => 'block focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full ' . $class,
  ]) }}
  ></textarea>
</x-form-input.base>
