<div>
  <div class="flex items-center justify-between pb-6">
    <h2 class="text-3xl font-bold">
      {{ __('pages.orders.show') }} #{{ $order->id }}
    </h2>

    <div class="flex gap-2">
      @if ($this->showCancelButton())
        <x-buttons.danger wire:click="cancel">
          {{ __('pages.orders.cancel') }}
        </x-buttons.danger>
      @endif

      @if ($this->showCompleteButton())
        <x-buttons.secondary wire:click="complete">
          {{ __('pages.orders.complete') }}
        </x-buttons.secondary>
      @endif
    </div>
  </div>

  <form class="max-w-[600px] space-y-4">
    <div class="flex gap-4">
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('pages.orders.customer') }}
        </label>
        <div class="mt-1 text-gray-400">
          @if($order->customer_id)
            {{ $order->customer->name }} (ID: {{ $order->customer->id }})
          @else
            <span class="italic">{{ __('global.guest') }}</span>
          @endif
        </div>
      </div>
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('pages.orders.email') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $order->email ?? '—' }}
        </div>
      </div>
    </div>

    <div>
      <label class="block font-medium">
        {{ __('pages.orders.status') }}
      </label>
      <div class="mt-1 text-gray-400">
        {{ $order->status->value }}
      </div>
    </div>

    <div class="flex gap-4">
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('global.created_at') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $order->created_at }}
        </div>
      </div>
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('global.updated_at') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $order->updated_at }}
        </div>
      </div>
    </div>

    <div class="flex gap-4">
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('pages.orders.orderedAt') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $order->ordered_at ?? '—' }}
        </div>
      </div>
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('pages.orders.realizationAt') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $order->realization_at ?? '—' }}
        </div>
      </div>
    </div>

    <div class="flex gap-4">
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('pages.orders.shippingMethod') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $order->shipping_driver ?? '—' }}
        </div>
      </div>
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('pages.orders.billingMethod') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $order->billing_driver ?? '—' }}
        </div>
      </div>
    </div>

    <div class="flex gap-4">
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('pages.orders.itemsGross') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ number_format($order->items_gross, 2) }} zł
        </div>
      </div>
      <div class="w-1/2">
        <label class="block font-medium">
          {{ __('pages.orders.discountGross') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ number_format($order->discount_gross, 2) }}
        </div>
      </div>
    </div>

    <div>
      <label class="block font-medium">
        {{ __('pages.orders.totalGross') }}
      </label>
      <div class="mt-1 text-gray-400">
        {{ number_format($order->total_gross, 2) }} zł
      </div>
    </div>
  </form>

  <div class="mt-8">
    <h2 class="text-3xl font-bold py-10">
      {{ __('pages.orders.orderItems') }}
    </h2>
    <livewire:admin.sales.order-item-table :model-id="$order->id" />
  </div>
</div>
