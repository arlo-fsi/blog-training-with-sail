@extends('master')

@section('title', 'Add Blog')

@section('content')
    <div class="container py-4">
        <H4>Add New Blog</H4>
        <hr>

        <x-forms.alert />
        <form action="{{ route('blogCreate') }}" method="post">
            @csrf
            <x-forms.input id="title" label="Title" />

            <x-forms.select id="blog_category_id" label="Category" :list="$categories" />

            <textarea class="form-control" id="contents" name="contents"></textarea>

            <div class="row justify-content-end mt-3">
                <div class="col-md-2">
                    <x-forms.button label="Post" />
                </div>
            </div>
        </form>
    </div>

    <script>
        CKEDITOR.replace('contents', {
            filebrowserUploadUrl: "{{ route('articleUploadImage', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
