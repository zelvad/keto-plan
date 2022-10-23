<script>
    window.csrfToken = '{{ csrf_token() }}';
    window.baseFetch = window.fetch;
    window.userId = {{ $authUser?->id ?? 'null' }}
</script>
