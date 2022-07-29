@extends('master')

@section('content')
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <x-forms.alert />
                <script>
                  var alertList = document.querySelectorAll('.alert');
                  alertList.forEach(function (alert) {
                    new bootstrap.Alert(alert)
                  })
                </script>

                <div class="card p-3">
                    <h1>Login</h1>
                    <hr>
                    <form action="/login" method="POST" class="mb-4">
                        @csrf
                        <x-forms.input id="username" label="Username" type="text" value="{{ old('username') }}" />
                        <x-forms.input id="password" label="Psasword" type="password" value="{{ old('password') }}" />
                        <x-forms.button />
                    </form>
                    <p class="text-center">No account yet? <a href="/register">Register</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
