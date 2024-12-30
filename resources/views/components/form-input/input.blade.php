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
])

@php
  $id = $id ?? Str::random(8);
  $wireModel = $attributes->get('wire:model')
@endphp

<x-form-input.base
  class="block font-medium text-sm text-gray-700 dark:text-gray-300"
  :id="$id"
  :label="$label"
  :wireModel="$wireModel"
  :name="$name"

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
        'class' => 'block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 ' .
                   'focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 ' .
                   'rounded-md shadow-sm mt-1 w-full',
    ]) }}
  >
</x-form-input.base>
