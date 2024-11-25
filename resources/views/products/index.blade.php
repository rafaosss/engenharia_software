@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Novo Produto</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($products->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->nome }}</td>
                <td>{{ $product->categoria->nome }}</td>
                <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                <td>
                    {{ $product->nivel_estoque }}
                    @if ($product->nivel_estoque <= $product->nivel_reposicao)
                        <span class="badge bg-warning text-dark">Estoque baixo</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Nenhum produto encontrado.</p>
    @endif
</div>
@endsection
