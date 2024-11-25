{{-- resources/views/categories/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Categoria</h1>

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

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('categories.form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
