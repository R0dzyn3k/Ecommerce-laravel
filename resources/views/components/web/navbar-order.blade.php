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

              <div class="z-10">
                <a href="{{ route('web.cart') }}" wire:navigate class="group">
                  <div class="mx-auto w-10 h-10 rounded-full border border-[var(--webLightHoverColour)] bg-[var(--webLightHoverColour)]
                              group-hover:border-[var(--webThirdLightTextColour)] group-hover:bg-[var(--webThirdLightTextColour)]
                              text-[var(--webPrimaryLightTextColour)] transition duration-300 ease-in-out flex justify-center items-center"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L12 22M2 12H22" />
                    </svg>
                  </div>

                  <div class="text-[var(--webPrimaryTextColour)] text-center font-medium group-hover:text-[var(--webThirdLightTextColour)]">
                    Koszyk
                  </div>
                </a>
              </div>

              <div class="z-10">
                <a href="{{ route('web.order.login-or-register') }}" wire:navigate class="group">
                  <div class="mx-auto w-10 h-10 rounded-full border border-[var(--webLightHoverColour)] bg-[var(--webLightHoverColour)]
                              group-hover:border-[var(--webThirdLightTextColour)] group-hover:bg-[var(--webThirdLightTextColour)]
                              text-[var(--webPrimaryLightTextColour)] transition duration-300 ease-in-out flex justify-center items-center"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L12 22M2 12H22" />
                    </svg>
                  </div>

                  <div class="text-[var(--webPrimaryTextColour)] text-center font-medium group-hover:text-[var(--webThirdLightTextColour)]">
                    Logowanie lub rejestracja
                  </div>
                </a>
              </div>

              <div class="z-10">
                <a href="{{ route('web.cart') }}" wire:navigate class="group">
                  <div class="mx-auto w-10 h-10 rounded-full border border-[var(--webLightHoverColour)] bg-[var(--webLightHoverColour)]
                              group-hover:border-[var(--webThirdLightTextColour)] group-hover:bg-[var(--webThirdLightTextColour)]
                              text-[var(--webPrimaryLightTextColour)] transition duration-300 ease-in-out flex justify-center items-center"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L12 22M2 12H22" />
                    </svg>
                  </div>

                  <div class="text-[var(--webPrimaryTextColour)] text-center font-medium group-hover:text-[var(--webThirdLightTextColour)]">
                    Dostawa i płatność
                  </div>
                </a>
              </div>

              <div class="z-10">
                <a href="{{ route('web.cart') }}" wire:navigate class="group">
                  <div class="mx-auto w-10 h-10 rounded-full border border-[var(--webLightHoverColour)] bg-[var(--webLightHoverColour)]
                              group-hover:border-[var(--webThirdLightTextColour)] group-hover:bg-[var(--webThirdLightTextColour)]
                              text-[var(--webPrimaryLightTextColour)] transition duration-300 ease-in-out flex justify-center items-center"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L12 22M2 12H22" />
                    </svg>
                  </div>

                  <div class="text-[var(--webPrimaryTextColour)] text-center font-medium group-hover:text-[var(--webThirdLightTextColour)]">
                    Finalizacja
                  </div>
                </a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
