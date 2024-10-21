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
    'model' => null,
    'value' => null,
    'maxlength' => null,
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
  <input
    id="{{ $id ?? Str::random(8) }}"
    type="password"
    @if($name) name="{{ $name }}" @endif
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($autofocus) autofocus="autofocus" @endif
  @required($required)
  value="{{ old($name, $newValue) }}"
    @if($maxlength) maxlength="{{ max((int) $maxlength, 0) }}" @endif
    @disabled($disabled)
    {{ $attributes->merge(['class' =>'block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 ' .
        'focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 ' .
        'rounded-md shadow-sm mt-1 w-full']) }}
  >
</x-form-input.base>
