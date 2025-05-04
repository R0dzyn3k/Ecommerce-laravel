@props(['title' => null])

<div x-data="{ alerts: @js(\App\Facades\Cart::getChangesBag()->toArray()) }">
  {{-- Alerts --}}
  <template x-if="alerts.length">
    <div class="w-full space-y-2 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-8 mb-8 rounded-2xl shadow relative">
      <template x-for="(alert, index) in alerts" :key="index">
        <div class="flex items-start space-x-3 justify-between">
          <div class="flex items-start space-x-3">
            <svg class="w-6 h-6 flex-shrink-0 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M4.93 4.93l14.14 14.14M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span x-text="alert"></span>
          </div>
          <button @click="alerts.splice(index, 1)" class="text-yellow-500 hover:text-yellow-700">
            &times;
          </button>
        </div>
      </template>
    </div>
  </template>

  {{-- Main content --}}
  <div class="w-full h-fit bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md relative" {{ $attributes }}>
    @if($title)
      <h2 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6">{{ $title }}</h2>
    @endif
    {{ $slot }}
  </div>
</div>
