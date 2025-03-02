@props(['title' => ''])

<x-layouts.app :title="$title">
  <div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <header>
      @include('components.web.navbar-order')
    </header>

    <!-- Main content -->
    <main class="flex-grow bg-[var(--webPrimaryBackgroundColour)] relative">

      <div class="container mx-auto px-4 lg:px-0 py-16">
        <div {{ $attributes->merge(['class' => 'flex justify-center' ])}} >
          {{$slot}}
        </div>
      @include('components.alert-message' , ['web' => true])
    </main>

    <!-- Footer -->
    @include('components.web.footer-order')
  </div>
</x-layouts.app>
