@props([
    'items' => [],
])

<!-- Breadcrumbs -->
<nav class="text-sm text-[var(--breadcrumbsColour)] absolute top-6 left-6 lg:left-2">
  <a href="{{ route('web.homepage') }}" class="hover:underline" wire:navigate>{{ __('pages.home') }}</a>
  @php /** @var array<\App\Helpers\BreadcrumbItem> $items */ @endphp
  @foreach($items as $item)
     / 
    @if ($item->isLink())
      <a href="{{ $item->getUrl() }}" class="hover:underline" wire:navigate>{{ __($item->getLabel()) }}</a>
    @else
      <span class="text-[var(--webPrimaryTextColour)]">{{ __($item->getLabel()) }}</span>
    @endif
  @endforeach
</nav>
