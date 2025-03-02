<x-layouts.web-page-card title="Regulamin sklepu">
  <x-slot:top>
    <x-web.breadcrumbs :items="[\App\Helpers\BreadcrumbItem::make('Regulamin sklepu')]" />
  </x-slot:top>

  <!-- Terms and conditions -->
  <x-web.card-full title="Regulamin sklepu">
    <p class="text-gray-700 leading-relaxed">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id purus eget odio luctus tincidunt eget nec ligula.
      Nulla facilisi. Vestibulum et purus sed dui egestas ullamcorper eget non ipsum.
    </p>

    <h2 class="text-2xl font-bold mt-6">1. Postanowienia ogólne</h2>
    <p class="text-gray-700 leading-relaxed">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non nunc vehicula, malesuada risus nec, auctor elit.
    </p>

    <h2 class="text-2xl font-bold mt-6">2. Warunki zakupu</h2>
    <p class="text-gray-700 leading-relaxed">
      Proin sit amet justo at urna sagittis tincidunt. Suspendisse ut malesuada eros, nec scelerisque libero.
    </p>

    <h2 class="text-2xl font-bold mt-6">3. Zwroty i reklamacje</h2>
    <p class="text-gray-700 leading-relaxed">
      Vivamus pharetra urna in lectus cursus, ac vehicula lorem mattis. Nullam sit amet venenatis libero.
    </p>
  </x-web.card-full>
</x-layouts.web-page-card>
