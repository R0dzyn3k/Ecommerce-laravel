@php
  use App\Models\BaseModel;
  use Illuminate\Support\Str;
@endphp

@props([
    'id' => '',
    'model' => null,
    'name' => null,
    'label' => null,
])

@php
  if (empty($label)) {
    if (method_exists($model, 'getTranslationKey') && $name) {
        $label = __($model->getTranslationKey($name));
    } elseif ($model instanceof BaseModel) {
      $label = __(Str::lower(get_class($model)) . '_' . Str::lower($name));
    }
  }
@endphp

<div class="mb-5">
  @if($label)
    <label for="{{ $id }}" {{ $attributes->merge(['class' => '']) }} >
      {{ $label }}
    </label>
  @endif

  {{ $slot }}

  @if ($name && $errors->get($name))
    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
      @foreach ($errors->get($name) as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
</div>
