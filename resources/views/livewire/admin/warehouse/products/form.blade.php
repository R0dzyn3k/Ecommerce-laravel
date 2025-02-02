<div>
  <h2 class="text-3xl font-bold pb-6">
    @if($this->isExist)
      @lang('pages.products.edit')
    @else
      @lang('pages.products.new')
    @endif
  </h2>

  <form wire:submit.prevent="save" class="max-w-[600px]">
    <x-form-input.input
      :label="__('global.title')"
      wire:model="product.title"
      :placeholder="__('global.titlePlaceholder')"
      required
    />

    <x-form-input.textarea
      :label="__('global.description')"
      wire:model="product.description"
    />

    <x-form-input.input
      :label="__('pages.products.stock')"
      wire:model="product.stock"
      :placeholder="__('pages.products.stockPlaceholder')"
      type="number"
      step="1"
      required
      min="0"
    />

    <x-form-input.checkbox
      :label="__('global.is_active')"
      wire:model="product.is_active"
    />

    <x-form-input.select
      :label="__('pages.products.category')"
      wire:model="product.category_id"
      :options="App\Models\Category::mapForSelect()"
    />

    <x-form-input.select
      :label="__('pages.products.brand')"
      wire:model="product.brand_id"
      :options="App\Models\Brand::mapForSelect()"
    />

    <hr class="w-80 h-px my-8 mx-auto bg-gray-200 border-0 dark:bg-gray-700">

    <x-form-input.input
      :label="__('pages.products.ean')"
      wire:model="product.ean"
      :placeholder="__('pages.products.eanPlaceholder')"
    />

    <x-form-input.input
      :label="__('pages.products.sku')"
      wire:model="product.sku"
      :placeholder="__('pages.products.skuPlaceholder')"
    />

    <x-form-input.input
      :label="__('pages.products.mpn')"
      wire:model="product.mpn"
      :placeholder="__('pages.products.mpnPlaceholder')"
    />

    <hr class="w-80 h-px my-8 mx-auto bg-gray-200 border-0 dark:bg-gray-700">

    <x-form-input.input
      :label="__('pages.products.price')"
      wire:model="product.price"
      :placeholder="__('pages.products.pricePlaceholder')"
      type="number"
      required
      min="0"
    />

    <x-form-input.input
      :label="__('pages.products.discountPrice')"
      wire:model="product.discount_price"
      :placeholder="__('pages.products.discountPricePlaceholder')"
      type="number"
      min="0"
    />

    <x-form-input.select
      :label="__('pages.products.tax')"
      wire:model="product.tax_id"
      :options="App\Models\Tax::mapForSelect()"
      :add-default-option="false"
      required
    />

    <div class="flex items-center justify-center mt-4">
      <x-buttons.primary class="ms-3">
        @if($this->isExist)
          @lang('global.save')
        @else
          @lang('global.create')
        @endif
      </x-buttons.primary>
    </div>
  </form>

  @if($product?->exists)
    <div class="max-w-[600px]">
      <h1 class="text-2xl font-bold mb-4">{{ __('global.photo') }}</h1>
      @livewire('file-uploader', ['model' => $product, 'collectionName' => 'product_photo', 'singleFile' => true, 'route' => route('admin.warehouse.products.show', $product->id) ])
    </div>
  @endif
</div>
