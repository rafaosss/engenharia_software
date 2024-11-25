{{-- resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categorias</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nova Categoria</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($categories->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->nome }}</td>
                <td>{{ $category->descricao }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Nenhuma categoria encontrada.</p>
    @endif
</div>
@endsection
