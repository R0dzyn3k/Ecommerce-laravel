<x-layouts.web-page-card title="Blog">
  <x-slot:top>
    <x-web.breadcrumbs :items="[\App\Helpers\BreadcrumbItem::make('Blog')]" />
  </x-slot:top>

  <!-- Blog grid -->
  <x-web.card-full title="Nasze artykuły">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
      @foreach ($blogs as $blog)
        <div class="bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl overflow-hidden shadow-md transition-all duration-300 hover:scale-105">
          <a href="{{ route('web.blog.show', $blog->slug) }}" wire:navigate>
            <img
              src="{{ $blog->getFirstMediaUrl('blog_photo', 'thumbnail') ?: asset('images/sample.webp') }}"
              class="w-full h-48 object-cover"
              alt="{{ $blog->title }}"
            >

            <div class="p-6">
              <h3 class="text-xl font-semibold text-[var(--webPrimaryTextColour)]">{{ $blog->title }}</h3>
              <p class="text-gray-600 mt-2 line-clamp-3">{{ strip_tags(Str::limit($blog->content, 100)) }}</p>
            </div>
          </a>
        </div>
      @endforeach
    </div>

    <div class="mt-10">
      {{ $blogs->links('components.paginate') }}
    </div>
  </x-web.card-full>
</x-layouts.web-page-card>
