<footer class="bg-gray-800 text-[var(--webPrimaryLightTextColour)] mt-auto">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 p-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
      <!-- Section 1: About company -->
      <div class="text-center md:text-left">
        <h3 class="text-xl font-bold mb-4">{{ config('app.name', 'E-sklep') }}</h3>
        <p class="text-[var(--webSecondaryLightTextColour)] text-sm leading-relaxed">
          {{ __('web.company_description') }}
        </p>
      </div>
      <!-- Sekcja 2: Links -->
      <div class="text-center md:text-left">
        <h4 class="text-lg font-semibold mb-4">{{ __('web.legal') }}</h4>
        <ul class="space-y-2 text-[var(--webSecondaryLightTextColour)]" >
          <li><a href="{{ route('web.homepage.index') }}" class="hover:text-[var(--webLightHoverColour)] transition-colors" >{{ __('web.terms') }}</a></li>
          <li><a href="{{ route('web.homepage.index') }}" class="hover:text-[var(--webLightHoverColour)] transition-colors" >{{ __('web.privacy_policy') }}</a></li>
          <li><a href="{{ route('web.homepage.index') }}" class="hover:text-[var(--webLightHoverColour)] transition-colors" >{{ __('web.cookie_policy') }}</a></li>
        </ul>
      </div>
      <!-- Sekcja 3: Contact -->
      <div class="text-center md:text-left">
        <h4 class="text-lg font-semibold mb-4">{{ __('web.contact') }}</h4>
        <div class="text-[var(--webSecondaryLightTextColour)] space-y-2">
          <p>{{ __('web.email') }}: <a href="mailto:kontakt@eshop.pl" class="hover:text-[var(--webLightHoverColour)] transition-colors">kontakt@eshop.pl</a></p>
          <p>{{ __('web.phone') }}: <a href="tel:+48123456789" class="hover:text-[var(--webLightHoverColour)] transition-colors">+48 123 456 789</a></p>
          <p>{{ __('web.address') }}: ul. Kawiarska 15, 00-001 Warszawa</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright -->
  <div class="p-4 border-t border-[var(--webSecondaryLightTextColour)] text-center">
    <p class="text-sm text-[var(--webSecondaryLightTextColour)]">
      &copy; {{ date('Y') }} {{ config('app.name', 'E-sklep') }}. {{ __('web.copyright') }}
    </p>
  </div>
</footer>
