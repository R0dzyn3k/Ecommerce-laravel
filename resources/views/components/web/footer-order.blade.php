<footer class="text-[var(--webPrimaryLightTextColour)] mt-auto">
  <div class="container mx-auto px-4 lg:px-0 p-4">
    <div class="w-full flex justify-evenly">

      <div class="w-1/2 text-left text-gray-500 ">
        <h3 class="text-lg font-bold">Masz pytanie?</h3>

        <div class="text-[var(--webSecondaryLightTextColour)] flex flex-col">
          <p>{{ __('web.phone') }}: <a href="tel:+48123456789" class="hover:text-[var(--webLightHoverColour)] transition-colors">+48 123 456 789</a></p>
          <p>{{ __('web.email') }}: <a href="mailto:kontakt@eshop.pl" class="hover:text-[var(--webLightHoverColour)] transition-colors">kontakt@eshop.pl</a></p>
        </div>
      </div>

      <div class="w-1/2 text-[var(--webSecondaryLightTextColour)] text-right flex flex-col">
        <a href="{{ route('web.terms') }}" wire:navigate class="hover:text-[var(--webLightHoverColour)] transition-colors">{{ __('web.terms') }}</a></li>
        <a href="{{ route('web.privacy') }}" wire:navigate class="hover:text-[var(--webLightHoverColour)] transition-colors">{{ __('web.privacy_policy') }}</a></li>
        <a href="{{ route('web.cookies') }}" wire:navigate class="hover:text-[var(--webLightHoverColour)] transition-colors">{{ __('web.cookie_policy') }}</a></li>
      </div>
    </div>
  </div>
</footer>
