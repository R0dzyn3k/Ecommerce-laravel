@props(['menuItems' => []])
<div class="flex-none flex flex-col  w-[250px] min-h-full bg-[var(--adminSubMenuBackground)]">
  @foreach($menuItems as $menuItem)
    <livewire:admin.components.sub-menu-item
      :label="$menuItem['label']"
      :title="$menuItem['title']"
      :action="$menuItem['action']"
      class="p-6 border-b border-[var(--adminMainBackground)]"
    />
  @endforeach
</div>
