<div class="w-full lg:w-2/3 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md flex flex-col h-full">
  <h3 class="text-2xl font-bold text-[var(--webPrimaryTextColour)] pb-4">
    Polecane produkty
  </h3>

  <div class="flex flex-no-wrap gap-8 justify-evenly">
    @foreach($products as $product)
      <x-web.product-tile :product="$product" :url="$product->url" class="w-1/2" />
    @endforeach
  </div>
</div>
