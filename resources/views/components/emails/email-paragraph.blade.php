<p class="email-paragraph">
  {{ $slot }}
</p>

@once
  @push('styles')
    <style>
      .email-paragraph {
        word-wrap: break-word;
        margin-top: 24px
      }
    </style>
  @endpush
@endonce
