<x-emails.email-layout>
  <x-slot:title>
    {{ __('email.verifyAccount') }}
  </x-slot:title>

  <x-emails.email-header>
    {{ __('email.cta') }}
  </x-emails.email-header>

  <x-slot:content>
    <x-emails.email-button href="{{ $url }}">
      {{ __('email.verify') }}
    </x-emails.email-button>

  </x-slot:content>
</x-emails.email-layout>
