<div class="container mx-auto flex flex-col md:flex-row gap-0 py-16 px-4 lg:px-0">
  <!-- Left section -->
  <div class="w-full md:7/12 lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-t-2xl md:rounded-s-2xl md:rounded-tr-none p-8 flex flex-col justify-center shadow-md">
    <h3 class="text-2xl font-bold text-[var(--webPrimaryTextColour)] mb-4 text-center md:text-left">Zapisz się do newslettera</h3>
    <p class="text-gray-600 text-center md:text-left">Nie przegap żadnej promocji, zdobywaj dodatkowe rabaty</p>

    <form wire:submit.prevent="addToNewsletter" class="flex items-center sm:items-start justify-center md:justify-start mt-4 gap-2 max-sm:flex-col">
      <x-form-input.input name="email" type="email" wire:model="email" :placeholder="__('auth.email')" required web="true" :disabled="$subscribed" />

      <x-web.primary-button type="submit" :disabled="$subscribed">Zapisz się</x-web.primary-button>
    </form>

  </div>

  <!-- Right section -->
  <div class="w-full max-h-[200px] relative md:w-5/12 lg:w-1/2 bg-[var(--webPrimaryTabBackgroundColour)] rounded-b-2xl md:rounded-e-2xl md:rounded-bl-none overflow-hidden shadow-md">
    <img
      src="{{ asset('images/newsletter.webp') }}"
      class="w-full object-cover md:absolute md:bottom-0 max-lg:h-[200px]"
      alt="newsletter"
    />
  </div>
</div>
