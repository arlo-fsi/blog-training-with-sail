<div class="modal fade" id="modalArticle" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $addMode ? 'Add' : 'Edit' }} Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-forms.input id="title" label="Name" value="{{ $article == null ? '' : $article->title }}" />

                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="article_category_id">
                        @foreach ($categories as $item)
                            <span>{{ $item->name }}</span>
                            <option selected="{{ $item->article_category_id == $item->id }}" value="{{ $item->id }}">{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Select Category</label>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
