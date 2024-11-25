{{-- resources/views/categories/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Categoria</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Verifique os problemas abaixo:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        @include('categories.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
