<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->paginate(10);
        return view('stock.index', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'last_updated' => 'required|date',
        ]);

        Stock::create($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock created successfully.');
    }

    public function edit(Stock $stock)
    {
        $products = Product::all();
        return view('stock.edit', compact('stock', 'products'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'last_updated' => 'required|date',
        ]);

        $stock->update($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
