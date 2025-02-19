<div class="w-full bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl p-8 shadow-md flex flex-col h-full">
  <h3 class="text-2xl font-bold text-[var(--webPrimaryTextColour)] pb-4">
    Nowe produkty
  </h3>

  <div class="flex flex-no-wrap gap-8 justify-evenly">
    @foreach($products as $product)
      @php
        $extraClasses = ' w-1/3';
        $extraClasses .= $loop->last ?  ' max-lg:hidden' : '';
      @endphp
      <x-web.product-tile :product="$product" :url="$product->url" :class="$extraClasses" />
    @endforeach
  </div>
</div>
