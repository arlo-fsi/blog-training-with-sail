<div class="d-grid gap-2 mb-3">
    <button class="btn btn-outline-{{ $btnType }}" type="{{ $type }}"
        @if ($formId != null) form="{{ $formId }}" @endif>{{ $label }}</button>
</div>
