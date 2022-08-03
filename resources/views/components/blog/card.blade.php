<div class="row">
    <div class="col-12 text-truncate text-primary">
        <strong>
            <a href="{{ route('blogDetail', ['blog' => $blog]) }}">{{ $blog->title }}</a>
        </strong>
    </div>
    <div class="col-12 text-truncate text-success">
        <small>{{ $blog->category->name }}</small>
    </div>
</div>
<p class="text-muted mb-4">
    {!! $blog->short_description !!}
</p>
