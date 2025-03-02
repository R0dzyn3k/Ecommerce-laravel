@php
  use App\Helpers\BreadcrumbItem;

  $items = [
    BreadcrumbItem::make('Blog', route('web.blog.index')),
    BreadcrumbItem::make($blog->title),
  ];
@endphp

<x-layouts.web-page-card :title="'Blog - ' . $blog->title">
  <x-slot:top>
    <x-web.breadcrumbs :items="$items" />
  </x-slot:top>

  <!-- Blog details -->
  <x-web.card-full :title="$blog->title">
    <img src="{{ $blog->getFirstMediaUrl('blog_photo') ?: asset('images/sample.webp') }}" alt="{{ $blog->title }}" class="w-full h-96 object-cover rounded-xl mb-6">

    <div class="prose max-w-full text-gray-700">
      {!! $blog->content !!}
    </div>
  </x-web.card-full>
</x-layouts.web-page-card>
