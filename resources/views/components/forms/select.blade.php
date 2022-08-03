<div class="form-floating mb-3">
    <select required class="form-select @error($id) is-invalid @enderror" id="{{ $id }}"
        aria-label="Floating label select example" name="{{ $id }}">
        <option>Select {{ $label }}</option>
        @foreach ($list as $item)
            <span>{{ $item->name }}</span>
            <option selected="{{ $value == $item->id }}" value="{{ $item->id }}">
                {{ $item->name }}
            </option>
        @endforeach
    </select>
    <label for="{{ $id }}">Select {{ $label }}</label>
    @error($id)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
