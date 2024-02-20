@extends('layouts.main')
@section('container')
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/auth/loginAdd" method="post" class="form-signin m-auto mt-5 text-center" style="width: 30%">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign In</button>
        <p class="mt-2">Belum Punya Akun?<span class="text-primary"> <a class="text-decoration-none" href="/auth/register">Daftar Sekarang</a></span></p>
    </form>
@endsection
