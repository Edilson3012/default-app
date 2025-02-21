<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.all.js') }}"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>

@if (session('type') == 'success')
    <div class="alert alert-success alert-dismissible show fade">
        <i class="bi bi-check-circle"></i> {{ session('message') }}
    </div>
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ session('message') }}",
            timer: 2500
        });
    </script>
@endif

@if (session('type') == 'error')
    <div class="alert alert-danger alert-dismissible show fade">
        <i class="bi bi-x-circle"></i> {{ session('message') }}
    </div>
    <script>
        Swal.fire({
            icon: 'error',
            title: "{{ session('message') }}",
            showConfirmButton: false,
            timer: 4500
        });
    </script>
@endif

@if (session('type') == 'info')
    <div class="alert alert-info alert-dismissible show fade">
        <i class="bi bi-info-circle"></i> {{ session('message') }}
    </div>
    <script>
        Swal.fire({
            icon: 'info',
            title: "{{ session('message') }}",
            showConfirmButton: false,
            timer: 4500
        });
    </script>
@endif

@if (session('type') == 'warning')
    <div class="alert alert-warning alert-dismissible show fade">
        <i class="bi bi-exclamation-triangle"></i> {{ session('message') }}
    </div>
    <script>
        Swal.fire({
            icon: 'warning',
            title: "{{ session('message') }}",
            showConfirmButton: false,
            timer: 4500
        });
    </script>
@endif
