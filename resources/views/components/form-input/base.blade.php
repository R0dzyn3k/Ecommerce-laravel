@props([
    'id' => '',
    'name' => null,
    'label' => null,
    'wireModel' => null,
])

<div class="form-group mb-5 relative">
  @if($label)
    <label for="{{ $id }}" {{ $attributes->merge(['class' => '']) }}>
      {{ $label }}
    </label>
  @endif

  {{ $slot }}

  @php
    $errorKey = $name ?? $wireModel;
  @endphp

  @if($errorKey && $errors->has($errorKey))
    <ul class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">
      @foreach ($errors->get($errorKey) as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
</div>
