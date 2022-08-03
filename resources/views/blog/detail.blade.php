@extends('master')

@section('title', $blog->title)


@section('content')
    <div class="container py-4">
        <h3>
            {{ $blog->title }}
            <a href="{{ route('blogEdit', ['blog' => $blog]) }}"><box-icon name='edit-alt' color="gray"></box-icon></a>
        </h3>
        <p><strong class="text-info">{{ $blog->category->name }}</strong></p>
        <hr>
        {!! $blog->contents !!}
    </div>
@endsection
