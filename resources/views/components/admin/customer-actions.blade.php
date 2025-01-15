<div class="relative flex justify-end align-middle">
  <x-buttons.danger wire:click.stop="delete({{ $id }})" class="gap-1">
    @svg('heroicon-o-trash', 'h-5 w-5')
    @lang('global.delete')
  </x-buttons.danger>
</div>
