@php
  use Illuminate\Support\Str;
@endphp

@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'value' => '1', // Domyślna wartość dla checkboxa
    'required' => false,
    'disabled' => false,
    'class' => null,
    'labelClass' => null,
])

@php
  $id = $id ?? Str::random(8);
  $wireModel = $attributes->get('wire:model');
  $defaultClass = 'border-gray-700 bg-gray-900 text-gray-300';
  $labelDefaultClass = 'text-gray-300';
@endphp

<x-form-input.base
  class="block font-medium text-sm {{$labelClass ?? $labelDefaultClass}}"
  :id="$id"
  :label="$label"
  :wireModel="$wireModel"
  :name="$name"
>
  <div class="flex items-center">
    <input type="hidden" value="0" @if($wireModel) wire:model.fill="{{ $wireModel }}" @endif @if($name) name="{{ $name }}" @endif>

    <input
      type="checkbox"
      id="{{ $id }}"
      @if($name) name="{{ $name }}" @endif
    @if($value) value="{{ $value }}" @endif
    @required($required)
    @disabled($disabled)
    wire:model="{{ $wireModel }}"
      {{ $attributes->merge([
          'class' => 'rounded text-indigo-600 shadow-sm focus:ring-indigo-500 border-gray-700 focus:ring-indigo-600' . ($class ?? $defaultClass),
      ]) }}
    >
    @if($label)
      <label for="{{ $id }}" class="ml-2 text-sm {{ $labelClass ?? $labelDefaultClass }}">
        {{ $label }}
      </label>
    @endif
  </div>
</x-form-input.base>
