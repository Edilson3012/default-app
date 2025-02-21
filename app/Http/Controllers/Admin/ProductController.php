<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

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
            $validatedData = $request->validate([
                'description' => 'required|string|max:255',
                'price' => ['required', 'regex:/^\d{1,3}(\.\d{3})*(,\d{2})?$/'],
            ], [
                'description.required' => 'A descrição é obrigatória!',
                'description.max' => 'A descrição deve ter no máximo 255 caracteres!',
                'price.required' => 'O preço é obrigatório!',
                'price.regex' => 'Formato de preço inválido! Exemplo válido: 1.234,56',
            ]);
            $validatedData['price'] = (float) str_replace(['.', ','], ['', '.'], $validatedData['price']);
            Product::create($validatedData);
            $products = Product::all();
            return redirect()->route('product.index')->with([
                'type' => 'success',
                'message' => 'Registro salvo com sucesso!'
            ]);
            return view('admin.product.index', compact('products'))->with(['type' => 'success', 'message' => 'Registro salvo com sucesso!']);
        } catch (Exception $ex) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Atenção: ' . $ex->getMessage(),
            ]);
        }
    }
}
