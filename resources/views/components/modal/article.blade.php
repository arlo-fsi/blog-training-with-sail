{{-- ADD and EDIT MODAL --}}
<div class="modal fade" id="modalArticle{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ $addMode ? route('articleCreate') : route('articleUpdate', ['article' => $article]) }}"
            method="post">
            @csrf
            @if (!$addMode)
                @method('PUT')
            @endif
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $addMode ? 'Add' : 'Edit' }} Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-forms.input id="title" label="Name"
                        value="{{ $article == null ? '' : $article->title }}" />

                    <x-forms.select id="article_category_id" label="Category" :list="$categories" :value="$articleCategoryId" />

                    <textarea class="form-control" id="contents{{ $id }}" name="contents">{{ $article == null ? '' : $article->contents }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace('contents' + '{{ $id }}', {
        filebrowserUploadUrl: "{{ route('articleUploadImage', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>


{{-- DELETE MODAL --}}
@if ($article)
    <div class="modal fade" id="modalArticleDelete{{ $id }}" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action="{{ route('articleDelete', ['article' => $article]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong>{{ $article->title }}</strong>?
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
