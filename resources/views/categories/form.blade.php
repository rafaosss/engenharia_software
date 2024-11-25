{{-- resources/views/categories/form.blade.php --}}
<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $category->nome ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" class="form-control">{{ old('descricao', $category->descricao ?? '') }}</textarea>
</div>
