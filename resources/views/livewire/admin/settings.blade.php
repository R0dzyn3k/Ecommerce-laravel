<div>
  <h2 class="text-3xl font-bold pb-6">{{ __('pages.settings.title') }}</h2>

  <div class="flex flex-wrap gap-6">

    <a class="h-[150px] w-[300px] bg-[var(--adminSubMenuBackground)] p-5 flex flex-col items-center" href="{{ route('admin.settings.administrators') }}" title="{{ __('pages.administrators.title') }}" wire:navigate>
      <div class="w-[60px] h-[60px] fill-current">
        <x-icon name="user" />
      </div>
      <h3 class="pt-5 text-lg font-bold">{{ __('pages.administrators.title') }}</h3>
    </a>


    <div class="h-[150px] w-[300px] bg-[var(--adminSubMenuBackground)]"></div>
    <div class="h-[150px] w-[300px] bg-[var(--adminSubMenuBackground)]"></div>
    <div class="h-[150px] w-[300px] bg-[var(--adminSubMenuBackground)]"></div>
  </div>
</div>
