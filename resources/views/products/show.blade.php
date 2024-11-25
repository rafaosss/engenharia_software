@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Produto</h1>
    <div class="card">
        <div class="card-header">
            {{ $product->nome }}
        </div>
        <div class="card-body">
            <p><strong>Descrição:</strong> {{ $product->descricao }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($product->preco, 2, ',', '.') }}</p>
            <p><strong>Categoria:</strong> {{ $product->categoria->nome }}</p>
            <p><strong>Estoque:</strong> {{ $product->nivel_estoque }}</p>
            <p><strong>Nível de Reposição:</strong> {{ $product->nivel_reposicao }}</p>
        </div>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
