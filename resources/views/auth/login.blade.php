@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Login</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Erro!</strong> {{ $errors->first('email') }}
    </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
@endsection