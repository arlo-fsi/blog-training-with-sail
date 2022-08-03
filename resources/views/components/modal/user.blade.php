{{-- ADD and EDIT MODAL --}}
<div class="modal fade" id="modalUser{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ $addMode ? route('userCreate') : route('userUpdate', ['user' => $user]) }}" method="post">
            @csrf
            @if (!$addMode)
                @method('PUT')
            @endif
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $addMode ? 'Add' : 'Edit' }} User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-forms.input id="username" label="Username" value="{{ $user == null ? '' : $user->username }}" />
                    <x-forms.input id="first_name" label="First Name"
                        value="{{ $user == null ? '' : $user->first_name }}" />
                    <x-forms.input id="last_name" label="Last Name"
                        value="{{ $user == null ? '' : $user->last_name }}" />

                    <div class="form-floating mb-3">
                        <select required class="form-select @error('role') is-invalid @enderror" id="role"
                            aria-label="Floating label select example" name="role">
                            <option>Select Role</option>
                            @foreach ($roles as $key => $value)
                                <option @if ($user != null && $user->role == $value) selected @endif value="{{ $value }}">
                                    {{ $key }}
                                </option>
                            @endforeach
                        </select>
                        <label for="role">Select Role</label>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <hr>

                    <x-forms.input id="password" type="password" label="Password" />
                    <x-forms.input id="password_confirmation" type="password" label="Password Confirmation" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- DELETE MODAL --}}
@if ($user)
    <div class="modal fade" id="modalUserDelete{{ $id }}" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action="{{ route('userDelete', ['user' => $user]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        Are you sure you want to delete <strong>{{ $user->username }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
