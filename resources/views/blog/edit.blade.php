@extends('master')

@section('title', 'Edit Blog')

@section('content')
    <div class="container py-4">
        <H4>Edit Blog</H4>
        <hr>

        <x-forms.alert />
        <form id="update" action="{{ route('blogUpdate', ['blog' => $blog]) }}" method="post">
            @csrf
            @method('PUT')
            <x-forms.input id="title" label="Title" value="{{ $blog->title }}" />

            <x-forms.select id="blog_category_id" label="Category" :list="$categories" value="{{ $blog->blog_category_id }}" />

            <textarea class="form-control" id="contents" name="contents">{{ $blog->contents }}</textarea>
        </form>

        <div class="row mt-3">
            <div class="col-md-2 me-auto">
                <form id="delete" action="{{ route('blogDelete', ['blog' => $blog]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-forms.button label="Delete" btnType="danger" formId="delete" />
                </form>
            </div>
            <div class="col-auto">
                <a class="btn btn-link" href="{{ route('blogDetail', ['blog' => $blog]) }}" role="button">Cancel</a>
            </div>
            <div class="col-md-2">
                <x-forms.button label="Update" formId="update" />
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('contents', {
            filebrowserUploadUrl: "{{ route('articleUploadImage', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
