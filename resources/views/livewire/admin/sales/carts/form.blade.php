<div>
  <h2 class="text-3xl font-bold pb-6">
    {{ __('pages.carts.show') }} #{{ $cart->id }}
  </h2>

  <form class="max-w-[600px] space-y-4">
    <div>
      <label class="block font-medium ">
        {{ __('pages.orders.customer') }}
      </label>
      <div class="mt-1 text-gray-400">
        @if($cart->customer)
          {{ $cart->customer->name }} (ID: {{ $cart->customer->id }})
        @else
          <span class="italic">{{ __('global.guest') }}</span>
        @endif
      </div>
    </div>

    <div class="flex gap-4">
      <div class="w-1/2">
        <label class="block font-medium ">
          {{ __('global.created_at') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $cart->created_at }}
        </div>
      </div>
      <div class="w-1/2">
        <label class="block font-medium ">
          {{ __('global.updated_at') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ $cart->updated_at }}
        </div>
      </div>
    </div>

    <div class="flex gap-4">
      <div class="w-1/2">
        <label class="block font-medium ">
          {{ __('pages.orders.itemsGross') }}
        </label>
        <div class="mt-1 text-gray-400">
          {{ number_format($cart->items_gross, 2) }} zł
        </div>
      </div>
    </div>
  </form>

  <div class="mt-8">
    <h2 class="text-3xl font-bold py-10">
      {{ __('pages.orders.orderItems') }}
    </h2>
    <livewire:admin.sales.order-item-table :model-id="$cart->id" />
  </div>
</div>
