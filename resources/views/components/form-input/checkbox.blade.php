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
    'web' => false,
])

@php
  $id = $id ?? Str::random(8);
  $wireModel = $attributes->get('wire:model');

    if (! $class) {
   $class = $web ? 'bg-white border-gray-400' : 'border-gray-700 bg-gray-900 text-gray-300';
  }

  if (! $labelClass) {
    $labelClass = $web ? 'text-[var(--webPrimaryTextColour)]' : 'text-gray-300';
  }
@endphp

<x-form-input.base
  class="block font-medium text-sm {{ $labelClass }}"
  :id="$id"
  :wireModel="$wireModel"
  :name="$name"
  web="{{ $web }}"
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
          'class' => 'rounded text-indigo-600 shadow-sm focus:ring-indigo-500 border-gray-700 focus:ring-indigo-600' . $class,
      ]) }}
    >
    @if($label)
      <label for="{{ $id }}" class="ml-2 text-sm {{ $labelClass }}">
        {{ $label }}
      </label>
    @endif
  </div>
</x-form-input.base>
