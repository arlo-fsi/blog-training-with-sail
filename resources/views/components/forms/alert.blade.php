@if (session('success') || session('error'))
    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success</strong> {{ session('success') ?? session('error') }}
    </div>
@endif
