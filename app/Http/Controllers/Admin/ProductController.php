<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->validateProduct($request);
            $validatedData['price'] = formatPrice($validatedData['price']);

            Product::create($validatedData);

            return redirect()->route('product.index')->with([
                'type' => 'success',
                'message' => 'Registro salvo com sucesso!'
            ]);
        } catch (Throwable $ex) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Atenção: ' . $ex->getMessage(),
            ]);
        }
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validatedData = $this->validateProduct($request);
            $validatedData['price'] = formatPrice($validatedData['price']);

            $product->update($validatedData);

            return redirect()->route('product.index')->with([
                'type' => 'success',
                'message' => 'Registro alterado com sucesso!'
            ]);
        } catch (Throwable $ex) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Atenção: ' . $ex->getMessage(),
            ]);
        }
    }

    private function validateProduct(Request $request)
    {
        return $request->validate([
            'description' => 'required|string|max:255',
            'price' => ['required', 'regex:/^\d{1,3}(\.\d{3})*(,\d{2})?$/'],
        ], [
            'description.required' => 'A descrição é obrigatória!',
            'description.max' => 'A descrição deve ter no máximo 255 caracteres!',
            'price.required' => 'O preço é obrigatório!',
            'price.regex' => 'Formato de preço inválido! Exemplo válido: 1.234,56',
        ]);
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('product.index')->with([
                'type' => 'success',
                'message' => 'Registro excluído com sucesso!'
            ]);
        } catch (\Throwable $ex) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Erro ao excluir: ' . $ex->getMessage(),
            ]);
        }
    }
}
