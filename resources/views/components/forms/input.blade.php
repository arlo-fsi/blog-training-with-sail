<div class="form-floating mb-3">
    <input id="{{ $id }}" name="{{ $id }}" type="{{ $type }}" class="form-control @error($id) is-invalid @enderror"
        id="floatingInput{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value }}" required>
    <label for="floatingInput{{ $id }}">{{ $label }}</label>
    @error($id)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
