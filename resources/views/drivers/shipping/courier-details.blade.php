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

<div class="flex gap-4 pb-2">
  <div class="w-1/2">
    <label class="block font-medium">
      Ulica
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['street'] }}
    </div>
  </div>
  <div class="w-1/2">
    <label class="block font-medium">
      Nr. budynku
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['building_nr'] }}
    </div>
  </div>
</div>

<div class="flex gap-4 pb-2">
  <div class="w-1/2">
    <label class="block font-medium">
      Nr. mieszkania
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['apartment_nr'] ?? ' -- ' }}
    </div>
  </div>
  <div class="w-1/2">
    <label class="block font-medium">
      Kod pocztowy
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['postcode'] }}
    </div>
  </div>
</div>

<div class="flex gap-4 pb-2">
  <div class="w-1/2">
    <label class="block font-medium">
      Miasto
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['city'] }}
    </div>
  </div>
  <div class="w-1/2">
    <label class="block font-medium">
      Województwo
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['region'] }}
    </div>
  </div>
</div>

<div class="flex gap-4 pb-2">
  <div class="w-full">
    <label class="block font-medium">
      Dodatkowa linia adresu
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['first_line'] ?? ' -- ' }}
    </div>
  </div>
</div>

<div class="flex gap-4 pb-2">
  <div class="w-full">
    <label class="block font-medium">
      Druga linia adresu
    </label>
    <div class="mt-1 text-gray-400">
      {{  $cart->shipping_data['second_line'] ?? ' -- ' }}
    </div>
  </div>
</div>
