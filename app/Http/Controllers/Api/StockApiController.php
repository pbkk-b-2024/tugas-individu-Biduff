<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockApiController extends Controller
{
    // GET: /api/stocks
    public function index()
    {
        $stocks = Stock::with('product')->get();
        return response()->json($stocks, 200);
    }

    // POST: /api/stocks
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'last_updated' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create a new stock record
        $stock = Stock::create($request->all());

        return response()->json($stock, 201);
    }

    // GET: /api/stocks/{id}
    public function show($id)
    {
        $stock = Stock::with('product')->find($id);

        if (!$stock) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        return response()->json($stock, 200);
    }

    // PUT: /api/stocks/{id}
    public function update(Request $request, $id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'last_updated' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update the stock record
        $stock->update($request->all());

        return response()->json($stock, 200);
    }

    // DELETE: /api/stocks/{id}
    public function destroy($id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        $stock->delete();

        return response()->json(['message' => 'Stock deleted successfully'], 200);
    }
}
