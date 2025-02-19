<div class="mx-full bg-[var(--webPrimaryBackgroundColour)]">
  <div
    class="relative flex items-center justify-center bg-cover bg-center"
    style=" height: clamp(400px, 50vw, 800px); background-image: url('{{ asset('images/hero.webp') }}');"
  >
    <div class="container relative w-full h-full">
      <h2 class="text-4xl font-bold text-[var(--webPrimaryTextColour)] absolute left-10 top-[25%] md:text-5xl lg:text-6xl">
        {{ config('app.name', 'E-sklep') }}
      </h2>
    </div>
  </div>
</div>
