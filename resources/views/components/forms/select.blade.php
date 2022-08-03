<div class="form-floating mb-3">
    <select required class="form-select @error($id) is-invalid @enderror" id="{{ $id }}"
        aria-label="Floating label select example" name="{{ $id }}">
        <option>Select {{ $label }}</option>
        @foreach ($list as $item)
            <option @if ($value == $item->id) selected @endif value="{{ $item->id }}">
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
