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
</div>
