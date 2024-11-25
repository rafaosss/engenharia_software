<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Método index para listar produtos
    public function index()
    {
        $products = Product::with('categoria')->get();
        return view('products.index', compact('products'));
    }

    // Método create para mostrar o formulário de criação
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Método store para salvar o produto
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categories,id',
            'nivel_estoque' => 'required|integer',
            'nivel_reposicao' => 'required|integer',
        ]);

        // Criação do produto
        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produto criado com sucesso.');
    }

    // Método edit para mostrar o formulário de edição
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Método update para atualizar o produto
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categories,id',
            'nivel_estoque' => 'required|integer',
            'nivel_reposicao' => 'required|integer',
        ]);

        // Atualização do produto
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produto atualizado com sucesso.');
    }

    // Método destroy para remover o produto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produto removido com sucesso.');
    }
}
