<h1 class="email-title">
  {{ $slot }}
</h1>

@once
  @push('styles')
    <style>
      .email-title {
        font-size: 24px;
        margin: 24px 0 32px;
      }
    </style>
  @endpush
@endonce
