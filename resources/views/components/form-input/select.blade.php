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
  <select
    id="{{ $id }}"
    @if($name) name="{{ $name }}" @endif
    @required($required)
    @disabled($disabled)
    @readonly($readonly)
    {{ $attributes->merge([
        'class' => 'block focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full ' . $class,
  ]) }}
  >
    @if($addDefaultOption)
      <option value="" hidden>{{ $placeholder ?? '-- wybierz --' }}</option>
    @endif

    @foreach ($options as $value => $optionLabel)
      <option value="{{ $value }}">{{ $optionLabel }}</option>
    @endforeach
  </select>

</x-form-input.base>
