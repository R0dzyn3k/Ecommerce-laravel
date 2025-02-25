<x-layouts.web-page title="Blog">
  <!-- Breadcrumbs -->
  <x-slot:breadcrumbs>
    <span class="text-[var(--webPrimaryTextColour)]">Blog</span>
  </x-slot:breadcrumbs>

  <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6">Nasze artykuły</h1>

  <!-- Blog grid -->
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
            <h3 class="text-xl font-semibold text-gray-900">{{ $blog->title }}</h3>
            <p class="text-gray-600 mt-2 line-clamp-3">{{ strip_tags(Str::limit($blog->content, 100)) }}</p>
          </div>
        </a>
      </div>
    @endforeach
  </div>

  <!-- Pagination -->
  <div class="mt-10">
    {{ $blogs->links() }}
  </div>
</x-layouts.web-page>
