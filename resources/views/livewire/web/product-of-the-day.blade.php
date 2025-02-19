<div class="w-full lg:w-1/3 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md flex flex-col h-full">
  <h3 class="text-2xl font-bold text-[var(--webPrimaryTextColour)] pb-4">
    Produkt dnia
  </h3>

  <x-web.product-tile :product="$product" :url="$url" />
</div>

