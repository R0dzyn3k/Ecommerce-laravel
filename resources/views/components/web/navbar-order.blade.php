<nav class="w-full bg-[var(--webPrimaryTabBackgroundColour)] shadow-lg">
  <!-- Top bar -->
  <div class="border-b border-gray-300 relative">
    <div class="container mx-auto relative bg-[var(--webHeaderBackgroundColour)]">
      <div class="flex justify-between max-md:items-center max-md:flex-col md:h-24 px-4 lg:px-0 md:gap-16 max-md:p-2">
        <div class="flex-shrink-0 flex items-center">
          <a href="{{ route('web.homepage') }}" wire:navigate class="text-2xl font-bold text-[--webThirdLightTextColour]">
            {{ config('app.name', 'E-sklep') }}
          </a>
        </div>

        <div class="flex flex-1 justify-between items-center relative w-full">
          <div class="absolute top-[1.23rem] md:top-[2.23rem] left-2 w-[95%] border-t border-gray-400"></div>
          <div class="flex justify-between w-full">

            @php
              use Illuminate\Support\Facades\Auth;

              $userAuth = Auth::guard('web')->check();
              $route = request()->route();

              $isFinalizeOrder = $route->named('web.order.finalize-order');
              $isDeliveryPayment = $route->named('web.order.delivery-and-payment');

              $steps = [
                [
                  'title' => 'Koszyk',
                  'route' => 'web.cart',
                  'disabled' => false,
                ],
              ];

              if (! $userAuth) {
                $steps[] = [
                  'title' => 'Logowanie lub rejestracja',
                  'route' => 'web.order.login-or-register',
                  'disabled' => !($isFinalizeOrder || $isDeliveryPayment),
                ];
              }

              $steps[] = [
                'title' => 'Dostawa i płatność',
                'route' => 'web.order.delivery-and-payment',
                'disabled' => !$isFinalizeOrder,
              ];

              $steps[] = [
                'title' => 'Finalizacja',
                'route' => 'web.order.finalize-order',
                'disabled' => true,
              ];
            @endphp

            @foreach($steps as $key => $step)
              <div class="z-10">
                <x-web.order-step-button
                  :route="$step['route']"
                  :disabled="$step['disabled']"
                  number="{{ $key + 1 }}"
                >
                  {{ $step['title'] }}
                </x-web.order-step-button>
              </div>

            @endforeach


          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
