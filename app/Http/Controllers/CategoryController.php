<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Método index para listar categorias
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Método create para mostrar o formulário de criação
    public function create()
    {
        return view('categories.create');
    }

    // Método store para salvar a categoria
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
        ]);

        // Criação da categoria
        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categoria criada com sucesso.');
    }

    // Método edit para mostrar o formulário de edição
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Método update para atualizar a categoria
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
        ]);

        // Atualização da categoria
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categoria atualizada com sucesso.');
    }

    // Método destroy para remover a categoria
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoria removida com sucesso.');
    }
}
