@php
  use Illuminate\Support\Str;
@endphp

@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'options' => [],
    'required' => false,
    'disabled' => false,
    'placeholder' => false,
    'model' => null,
    'value' => null,
])

@php
  $id = $id ?? Str::random(8);
  $newValue = $value ?? $model?->{$name} ?? '';
@endphp

<x-form-input.base
  class="block font-medium text-sm text-gray-700 dark:text-gray-300"
  :id="$id"
  :name="$name"
  :model="$model"
  :label="$label"
>
  <select
    id="{{ $id }}"
    name="{{ $name }}"
    @required($required)
    @disabled($disabled)
    {{ $attributes->merge(['class' =>'block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 ' .
        'focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 ' .
        'rounded-md shadow-sm mt-1 w-full']) }}
  >
    @if($placeholder)
      <option value="">{{ $placeholder }}</option>
    @endif

    @foreach ($options as $key => $option)
      <option value="{{ $key }}" @if($key == $newValue) selected @endif>{{ $option }}</option>
    @endforeach
  </select>
</x-form-input.base>
