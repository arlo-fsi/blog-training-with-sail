@extends('master')

@section('title', 'Users')

@section('content')
    <div class="container py-4">
        <x-forms.alert />
        <div class="table-responsive">
            <div class="card p-3">
                <div class="row">
                    <div class="col">
                        <strong>Users</strong>
                    </div>
                    <div class="col-auto">
                        <box-icon name='book-add' color="blue" data-bs-toggle="modal" data-bs-target="#modalUseradd">
                        </box-icon>
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Registerd At</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td scope="row">{{ $item->username }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->role_text }}</td>
                                <td>{{ $item->registered_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <box-icon name='edit-alt' color="blue" data-bs-toggle="modal"
                                            data-bs-target="#modalUser{{ $item->id }}">
                                        </box-icon>
                                        <box-icon name='trash' color="red" data-bs-toggle="modal"
                                            data-bs-target="#modalUserDelete{{ $item->id }}">
                                        </box-icon>
                                    </div>
                                </td>
                            </tr>

                            <x-modal.user id="{{ $item->id }}" :addMode="false" :roles="$roles" :user="$item" />
                            <x-modal.user id="{{ $item->id }}" :addMode="false" :roles="$roles" :user="$item" />
                        @endforeach
                        @if (count($list) == 0)
                            <tr>
                                <td class="text-center" colspan="5">No Records Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                @if (count($list) > 0)
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            {{ $list->links() }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <x-modal.user id="add" :addMode="true" :roles="$roles" />
@endsection
