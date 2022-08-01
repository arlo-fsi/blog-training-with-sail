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
                        <a data-bs-toggle="modal" data-bs-target="#modalArticle">
                            <box-icon name='book-add' color="blue"></box-icon>
                        </a>
                    </div>
                </div>

                <hr>

                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Updated By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $item)
                            <tr>
                                <td scope="row">{{ $item->title }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->user->name }}</td>
                            </tr>
                        @endforeach
                        @if (count($articles) == 0)
                            <tr>
                                <td class="text-center" colspan="3">No Records Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                @if (count($articles) > 0)
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="visually-hidden">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="visually-hidden">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <x-modal.article :addMode="true" :categories="$categories" />
@endsection
