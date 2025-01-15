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
])

@php
  $id = $id ?? Str::random(8);
  $wireModel = $attributes->get('wire:model');
@endphp

<x-form-input.base
  class="block font-medium text-sm text-gray-700 dark:text-gray-300"
  :id="$id"
  :label="$label"
  :wireModel="$wireModel"
  :name="$name"
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
    {{ $attributes->merge([
        'class' => 'block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 ' .
                   'focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 ' .
                   'rounded-md shadow-sm mt-1 w-full',
    ]) }}
  ></textarea>
</x-form-input.base>
