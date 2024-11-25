<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $product->nome ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control">{{ old('descricao', $product->descricao ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="preco" class="form-label">Preço</label>
    <input type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco', $product->preco ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="categoria_id" class="form-label">Categoria</label>
    <select name="categoria_id" class="form-control" required>
        <option value="">Selecione uma categoria</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('categoria_id', $product->categoria_id ?? '') == $category->id) ? 'selected' : '' }}>
                {{ $category->nome }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="nivel_estoque" class="form-label">Nível de Estoque</label>
    <input type="number" name="nivel_estoque" class="form-control" value="{{ old('nivel_estoque', $product->nivel_estoque ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="nivel_reposicao" class="form-label">Nível de Reposição</label>
    <input type="number" name="nivel_reposicao" class="form-control" value="{{ old('nivel_reposicao', $product->nivel_reposicao ?? '') }}" required>
</div>
