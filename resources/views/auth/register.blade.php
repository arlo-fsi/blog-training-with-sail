@extends('master')

@section('content')
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card p-3">
                    <h1>Register</h1>
                    <hr>
                    <form action="/register" method="POST" class="mb-4">
                        @csrf
                        <x-forms.input id="first_name" label="First Name" type="text" value="{{ old('first_name') }}" />
                        <x-forms.input id="last_name" label="Last Name" type="text" value="{{ old('last_name') }}" />
                        <x-forms.input id="username" label="Username" type="text" value="{{ old('username') }}" />
                        <hr>
                        <x-forms.input id="password" label="Psasword" type="password" value="{{ old('password') }}" />
                        <x-forms.input id="password_confirmation" label="Psasword Confirmation" type="password" value="{{ old('password_confirmation') }}" />
                        <x-forms.button />
                    </form>
                    <p class="text-center">Already have an account? <a href="/">Login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
