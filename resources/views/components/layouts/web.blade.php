@props(['title' => ''])

<x-layouts.app :title="$title">
  <div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <header class="pt-[96px]">
      @include('components.web.navbar')
    </header>

    <!-- Main content -->
    <main class="flex-grow bg-[var(--webPrimaryBackgroundColour)]">
      {{ $slot }}
    </main>

    <!-- Footer -->
    @include('components.web.footer')
  </div>
</x-layouts.app>
