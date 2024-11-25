<div class="overflow-auto">
  <livewire:admin.components.link-button action="{{ route('admin.sales') }}" icon="sales" :label="__('pages.sales')" :title="__('pages.sales')" class="border-b border-[var(--adminMainBackground)]" />
  <livewire:admin.components.link-button action="{{ route('admin.warehouse') }}" icon="warehouse" :label="__('pages.warehouse')" :title="__('pages.warehouse')" class="border-b border-[var(--adminMainBackground)]" />
  <livewire:admin.components.link-button action="{{ route('admin.discounts') }}" icon="discounts" :label="__('pages.discounts')" :title="__('pages.discounts')" class="border-b border-[var(--adminMainBackground)]" />
  <livewire:admin.components.link-button action="{{ route('admin.customers') }}" icon="customers" :label="__('pages.customers')" :title="__('pages.customers')" class="border-b border-[var(--adminMainBackground)]" />
</div>
