@if (session('success') || session('error'))
    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success</strong> <br> {{ session('success') ?? session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Validation Error</strong> <br>
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
@endif
