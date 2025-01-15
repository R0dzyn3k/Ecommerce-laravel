@props(['menuItems' => []])

<div class="overflow-auto">
  @foreach($menuItems as $item)
    <livewire:admin.components.menu-item
      :label="$item['label']"
      :title="$item['title']"
      :action="$item['action']"
      :icon="$item['icon']"
      class="border-b border-[var(--adminMainBackground)]" />
  @endforeach

  <livewire:admin.components.menu-item
    action="{{ route('admin.customers.index') }}"
    icon="customers"
    :label="__('pages.customers.title')"
    :title="__('pages.customers.title')"
    class="border-b border-[var(--adminMainBackground)]"
  />
</div>
