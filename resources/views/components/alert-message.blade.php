<div
  x-data="{ show: false, type: '', message: '' }"
  x-cloak
  x-show="show"
  x-transition.opacity.duration.500ms
  x-on:show-alert.window="
        const detail = Array.isArray($event.detail) ? $event.detail[0] : $event.detail;
        type = detail.type;
        message = detail.message;
        show = true;
        setTimeout(() => show = false, 3000)
    "
  class="absolute top-4 right-4 text-white p-4 rounded shadow-lg"
  x-bind:class="{
        'bg-green-500': type === '{{ \App\Enums\AlertTypes::Success() }}',
        'bg-blue-500': type === '{{ \App\Enums\AlertTypes::Info() }}',
        'bg-yellow-500': type === '{{ \App\Enums\AlertTypes::Warning() }}',
        'bg-red-500': type === '{{ \App\Enums\AlertTypes::Error() }}'
    }"
>
  <p x-text="message"></p>
</div>
