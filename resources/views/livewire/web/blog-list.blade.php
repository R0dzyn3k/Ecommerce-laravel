<div class="container mx-auto flex flex-col gap-16 lg:flex-row xl:gap-16 px-4 lg:px-0">
  @foreach ($blogList as $blog)
    <div class="w-full lg:w-1/3 bg-[var(--webPrimaryTabBackgroundColour)] rounded-2xl overflow-hidden transition-all duration-300 shadow-md cursor-pointer hover:scale-105">
      <a href="{{ route('web.blog.show', $blog->slug) }}" wire:navigate>
        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center lg:text-left p-6">{{ $blog->title }}</h3>
        <img
          src="{{ $blog->getFirstMediaUrl('blog_photo', 'thumbnail') ?: asset('images/sample.webp') }}"
          class="w-full h-48 md:h-64 object-cover"
          alt="{{ $blog->title }}"
        >
      </a>
    </div>
  @endforeach
</div>

