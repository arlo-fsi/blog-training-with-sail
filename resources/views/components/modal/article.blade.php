<div class="modal fade" id="modalArticle" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('articleCreate') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $addMode ? 'Add' : 'Edit' }} Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-forms.input id="title" label="Name"
                        value="{{ $article == null ? '' : $article->title }}" />

                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="article_category_id">
                            <option selected>Select Category</option>
                            @foreach ($categories as $item)
                                <span>{{ $item->name }}</span>
                                <option selected="{{ $articleCategoryId == $item->id }}"
                                    value="{{ $item->id }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Select Category</label>
                    </div>

                    {{-- <textarea class="form-control" id="contents" name="contents"></textarea> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@section('scripts')
    <script>
        CKEDITOR.replace('contents', {
            filebrowserUploadUrl: "{{ route('articleUploadImage', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
