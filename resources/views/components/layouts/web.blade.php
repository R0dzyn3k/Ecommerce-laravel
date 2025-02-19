@props(['title' => ''])

<x-layouts.app :title="$title">
  <div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <header class="md:pt-[96px] pt-[32px]">
      @include('components.web.navbar')
    </header>

    <!-- Main content -->
    <main class="flex-grow bg-[var(--webPrimaryBackgroundColour)] relative">
      {{ $slot }}
      @include('components.alert-message' , ['web' => true])
    </main>

    <!-- Footer -->
    @include('components.web.footer')
  </div>
</x-layouts.app>
