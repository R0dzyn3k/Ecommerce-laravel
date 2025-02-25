<x-layouts.web-page :title="$blog->title">
  <x-slot:breadcrumbs>
    <a href="{{ route('web.blog.index') }}" class="hover:underline" wire:navigate>Blog</a> /
    <span class="text-[var(--webPrimaryTextColour)]">{{ $blog->title }}</span>
  </x-slot:breadcrumbs>

  <h1 class="text-3xl font-bold text-[var(--webPrimaryTextColour)] mb-6">{{ $blog->title }}</h1>

  <img src="{{ $blog->getFirstMediaUrl('blog_photo') ?: asset('images/sample.webp') }}" alt="{{ $blog->title }}" class="w-full h-96 object-cover rounded-xl mb-6">

  <!-- Blog content -->
  <div class="prose max-w-full text-gray-700">
    {!! $blog->content !!}
  </div>
</x-layouts.web-page>
