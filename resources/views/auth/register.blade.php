@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Erro!</strong> Houve alguns problemas com seu input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="senha_confirmation" class="form-label">Confirme a Senha</label>
            <input type="password" name="senha_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection