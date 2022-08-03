@extends('master')

@section('title', 'Blogs')

@section('content')
    <div class="container py-4">
        @foreach ($list as $item)
            <x-blog.card :blog="$item" />
        @endforeach
    </div>
@endsection
