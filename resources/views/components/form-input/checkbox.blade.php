@php
  use Illuminate\Support\Str;
  use App\Models\BaseModel;
@endphp

@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'checked' => false,
    'autofocus' => null,
    'model' => null,
    'value' => null,
])

@php
  $id = $id ?? Str::random(8);
  $newValue = $value ?? $model?->{$name} ?? '';

   if (empty($label)) {
      if (method_exists($model, 'getTranslationKey') && $name) {
        $label = __($model->getTranslationKey($name));
      } elseif ($model instanceof BaseModel) {
        $label = __(Str::lower(get_class($model)) . '_' . Str::lower($name));
      }
   }
@endphp

<div class="block mb-5">
    <label for="{{ $id }}" class="inline-flex items-center" >
      <input
        id="{{ $id }}"
        type="checkbox"
        @if($name) name="{{ $name }}" @endif
      @if($autofocus) autofocus="autofocus" @endif
      @required($required)
      @checked($checked)
      value="{{ old($name, $newValue) }}"
        @disabled($disabled)
        {{ $attributes->merge(['class' =>'rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 ' .
          'shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800']) }}
      >

      @if($label)
        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ $label }}</span>
      @endif
    </label>

  @if ($name && $errors->get($name))
    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
      @foreach ($errors->get($name) as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
</div>
