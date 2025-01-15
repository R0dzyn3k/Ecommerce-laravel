@php
  use Illuminate\Support\Str;
@endphp

@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'value' => '1', // Domyślna wartość dla checkboxa
    'checked' => false,
    'required' => false,
    'disabled' => false,
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
  <div class="flex items-center">
    <input type="hidden" value="0" @if($wireModel) wire:model.fill="{{ $wireModel }}" @endif @if($name) name="{{ $name }}" @endif>

    <input
      type="checkbox"
      id="{{ $id }}"
      @if($name) name="{{ $name }}" @endif
    @if($value) value="{{ $value }}" @endif
    @if($checked) checked="checked" @endif
    @required($required)
    @disabled($disabled)
    wire:model="{{ $wireModel }}"
      {{ $attributes->merge([
          'class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600',
      ]) }}
    >
    @if($label)
      <label for="{{ $id }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
        {{ $label }}
      </label>
    @endif
  </div>
</x-form-input.base>
