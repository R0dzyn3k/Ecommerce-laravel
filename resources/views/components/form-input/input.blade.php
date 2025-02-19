@php
  use Illuminate\Support\Str;
@endphp

@props([
    'id' => null,
    'name' => null,
    'type' => 'text',
    'label' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'autofocus' => null,
    'maxlength' => null,
    'min' => null,
    'max' => null,
    'step' => 1,
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
    $labelClass = $web ? 'text-[var(--webPrimaryTextColour)]]' : 'text-gray-300';
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
  <input
    id="{{ $id }}"
    @if($name) name="{{ $name }}" @endif
  type="{{ $type }}"
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($autofocus) autofocus="autofocus" @endif
  @required($required)
  @if($maxlength) maxlength="{{ max((int) $maxlength, 0) }}" @endif
  @if($min) min="{{ max((int) $min, 0) }}" @endif
  @if($max) max="{{ max((int) $max, 0) }}" @endif
  @if($step) step="{{ max((int) $step, 0) }}" @endif
    @disabled($disabled)
    @readonly($readonly)
    {{ $attributes->merge([
        'class' => 'block focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full ' . $class,
  ]) }}
  >
</x-form-input.base>
