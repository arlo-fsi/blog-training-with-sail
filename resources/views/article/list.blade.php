@extends('master')

@section('title', 'Articles')

@section('content')
    <div class="container py-4">
        <x-forms.alert />
        <div class="table-responsive">
            <div class="card p-3">
                <div class="row">
                    <div class="col">
                        <strong>Articles</strong>
                    </div>
                    <div class="col-auto">
                        <box-icon name='book-add' color="blue" data-bs-toggle="modal" data-bs-target="#modalArticleadd">
                        </box-icon>
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Updated By</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->image_path ?? 'https://autism.assisted.pk/images/default_blog_img.png' }}"
                                        alt="{{ $item->slug }}" height="30">
                                </td>
                                <td scope="row">{{ $item->title }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <box-icon name='edit-alt' color="blue" data-bs-toggle="modal"
                                            data-bs-target="#modalArticle{{ $item->id }}">
                                        </box-icon>
                                        <box-icon name='trash' color="red" data-bs-toggle="modal"
                                            data-bs-target="#modalArticleDelete{{ $item->id }}">
                                        </box-icon>
                                    </div>
                                </td>
                            </tr>

                            <x-modal.article id="{{ $item->id }}" :addMode="false" :categories="$categories"
                                :article="$item" />
                            <x-modal.article id="{{ $item->id }}" :addMode="false" :categories="$categories"
                                :article="$item" />
                        @endforeach
                        @if (count($articles) == 0)
                            <tr>
                                <td class="text-center" colspan="5">No Records Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                @if (count($articles) > 0)
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            {{ $articles->links() }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <x-modal.article id="add" :addMode="true" :categories="$categories" />
@endsection
