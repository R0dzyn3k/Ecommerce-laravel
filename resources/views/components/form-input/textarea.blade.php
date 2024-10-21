@php
  use Illuminate\Support\Str;
@endphp

@props([
    'id' => null,
    'type' => 'text',
    'name' => null,
    'label' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'autofocus' => null,
    'model' => null,
    'value' => null,
    'rows' => 2,
    'cols' => null,
    'wrap' => null,
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
<textarea
  id="{{ $id }}"
  name="{{ $name }}"
  placeholder="{{ $placeholder }}"
  @disabled($disabled)
  @required($required)
  @required($readonly)
  @if($autofocus) autofocus="autofocus" @endif
  @if($maxlength) maxlength="{{ max((int) $maxlength, 0) }}" @endif
  @if(in_array($wrap ?? '', ['hard', 'soft'])) wrap="{{ $wrap }}" @endif
  @if($cols) cols="{{ max((int) $cols, 0) }}" @endif
  rows="{{ max((int) $rows, 1) }}"
  {{ $attributes->class([
      'block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300',
      'focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600',
      'rounded-md shadow-sm mt-1 w-full',
  ]) }}>
      {{ old($name, $newValue) }}
  </textarea>
</x-form-input.base>
