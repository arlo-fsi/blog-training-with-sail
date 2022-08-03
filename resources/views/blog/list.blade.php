@extends('master')

@section('title', 'Blogs')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col mb-4">
                <form action="{{ route('blogList') }}" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="q" value="{{ $q }}"
                            placeholder="Search blog by title or category even contents"
                            aria-label="Search blog by title or category even contents" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
                <strong>Categories: </strong> &nbsp;
                @foreach ($categories as $item)
                    <a href="{{ route('blogList') . '?q=' . $item }}">
                        <span class="badge rounded-pill bg-secondary">{{ $item }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <x-forms.alert />
        @foreach ($list as $item)
            <x-blog.card :blog="$item" />
        @endforeach

        @if (count($list) == 0)
            <p class="text-center p-5">
                No Blog Found!
            </p>
        @endif

        <div class="row justify-content-center">
            <div class="col-auto">
                {{ $list->appends(['q' => $q])->links() }}
            </div>
        </div>
    </div>
@endsection
