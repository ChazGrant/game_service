@extends('layout')

@section('title') Регистрация @endsection

@section('main_content')
    <main class="form-signin">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/reg/check" class="m-auto w-50">
            @csrf

            <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="name" placeholder="Username">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password">
                <label for="floatingPassword">Confirm password</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Регистрация</button>
        </form>
    </main>
@endsection
