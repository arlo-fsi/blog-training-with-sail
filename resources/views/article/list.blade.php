@extends('master')

@section('title', 'Articles')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <div class="card p-3">
                <div class="row">
                    <div class="col">
                        <strong>Articles</strong>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('articleAdd') }}">
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
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

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

            </div>
        </div>
    </div>
@endsection
