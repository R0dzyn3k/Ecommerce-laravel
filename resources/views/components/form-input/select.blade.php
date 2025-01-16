@php
  use Illuminate\Support\Str;
@endphp

@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'options' => [], // ['value' => 'label']
    'addDefaultOption' => true,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
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
  <select
    id="{{ $id }}"
    @if($name) name="{{ $name }}" @endif
    @required($required)
    @disabled($disabled)
    @readonly($readonly)
    {{ $attributes->merge([
        'class' => 'block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 ' .
                   'focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 ' .
                   'rounded-md shadow-sm mt-1 w-full',
    ]) }}
  >

    <option value="" @if(! $addDefaultOption) hidden @endif >{{ $placeholder ?? __('global.defaultSelectPlaceholder') }}</option>

    @foreach ($options as $value => $optionLabel)
      <option value="{{ $value }}">{{ $optionLabel }}</option>
    @endforeach
  </select>

</x-form-input.base>
