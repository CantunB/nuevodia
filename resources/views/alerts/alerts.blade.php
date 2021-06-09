@if(session('status_info'))
    <script>
        Swal.fire({
            icon: 'info',
            title: '{{ session('status_info') }}',
            timer: 2000
        })
    </script>
@endif
@if(session('status_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('status_success') }}',
            timer: 2000
        })
    </script>
@endif
@if(session('status_warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: '{{ session('status_warning') }}',
            timer: 2000
        })
    </script>
@endif
@if(session('status_error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ session('status_error') }}',
            timer: 2000
        })
    </script>
@endif
@if(session('status_question'))
    <script>
        Swal.fire({
            icon: 'question',
            title: '{{ session('status_question') }}',
            timer: 2000
        })
    </script>
@endif
