<div class="flex gap-4 pb-2">
  <div class="w-1/2">
    <label class="block font-medium">
      E-mail
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['email'] }}
    </div>
  </div>
  <div class="w-1/2">
    <label class="block font-medium">
      Telefon
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['phone'] }}
    </div>
  </div>
</div>
