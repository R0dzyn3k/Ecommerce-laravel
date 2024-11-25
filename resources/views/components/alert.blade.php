@props(['type' => 'success', 'message' => ''])

<div x-data="{ show: true }" x-show="show" x-transition
  x-init="setTimeout(() => show = false, 5000)"
  :class="{
        'bg-green-500 text-white': '{{ $type }}' === 'success',
        'bg-red-500 text-white': '{{ $type }}' === 'error',
        'bg-yellow-500 text-white': '{{ $type }}' === 'warning',
        'bg-blue-500 text-white': '{{ $type }}' === 'info'
     }"
  class="p-4 rounded-md mb-4">
  <div class="flex items-center justify-between">
    <span>{{ $message }}</span>
    <button @click="show = false" class="text-white ml-4">✕</button>
  </div>
</div>
