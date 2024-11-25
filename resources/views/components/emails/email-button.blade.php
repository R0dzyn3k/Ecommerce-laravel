<table class="btn-table">
  <tbody>
    <tr>
      <td class="btn-data">
        <a class="btn-link" {{ $attributes }}>
          {{ $slot }}
        </a>
      </td>
    </tr>
  </tbody>
</table>

@once
  @push('styles')
    <style>
      .btn-table {
        margin: 24px auto !important;
        width: auto !important;
      }

      .btn-data {
        border-radius: 5px !important;
        padding: 6px 18px !important;
      }
    </style>
  @endpush
@endonce
