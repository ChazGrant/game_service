@extends('layout')
@section('title') Авторизация @endsection
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

        <form method="POST" action="/auth/check" class="m-auto w-50">
            @csrf

            <h1 class="h3 mb-3 fw-normal">Вход в аккаунт</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Вход</button>
        </form>
    </main>
@endsection
