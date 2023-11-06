@if (session()->has('error'))
    <div class="alert alert-error alert-dismissible fade show" , role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@endif