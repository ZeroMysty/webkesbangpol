<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof toastr === 'undefined') return;

        @if(session()->has('success'))
            toastr.success(@json(session('success')), 'BERHASIL!');
        @endif

        @if(session()->has('error'))
            toastr.error(@json(session('error')), 'GAGAL!');
        @endif

        @if(session()->has('warning'))
            toastr.warning(@json(session('warning')), 'PERINGATAN!');
        @endif

        @if(session()->has('info'))
            toastr.info(@json(session('info')), 'INFORMASI');
        @endif
    });
</script>
