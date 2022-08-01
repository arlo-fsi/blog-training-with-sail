@extends('master')

@section('title', 'Article Category')

@section('content')
    <div class="container p-4">
        <x-forms.alert />
        <div class="card p-3">
            <div class="row">
                <div class="col">
                    <strong>Article Categories</strong>
                </div>
            </div>
            <hr>

            <form action="{{ route('articleCategoryCreate') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Article Category Name"
                        aria-label="Article Category Name" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Create</button>
                </div>
            </form>

            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Updated By</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <td scope="row">{{ $item->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <box-icon name='edit-alt' color="blue" data-bs-toggle="modal" data-bs-target="#modalUpdateArticleCategory{{ $item->id }}"></box-icon>
                                    <box-icon name='trash' color="red" data-bs-toggle="modal" data-bs-target="#modalDeleteArticleCategory{{ $item->id }}"></box-icon>
                                </div>
                            </td>
                        </tr>

                        <x-modal.article-category :articleCategory="$item" />
                    @endforeach
                    @if (count($list) == 0)
                        <tr>
                            <td colspan="3" class="text-center">No Records Found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
