@props([
    'method' => 'POST'
])


<div>
  <form
    method="{{ $method }}"
      {{ $attributes }}
    >
    @csrf
    {{ $slot }}
  </form>
</div>
