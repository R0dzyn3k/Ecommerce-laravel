<div>
  <div class="flex justify-end pb-6">
    <x-buttons.primary wire:click="create" class="ms-3">@lang('global.create')</x-buttons.primary>
  </div>
  <livewire:admin.customers.user-table :model-class="\App\Models\Admin::class" />
</div>
