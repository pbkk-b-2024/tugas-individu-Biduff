<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderApiController extends Controller
{
    // GET: /api/orders
    public function index()
    {
        $orders = Order::with(['customer', 'product'])->get();
        return response()->json($orders, 200);
    }

    // POST: /api/orders
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Find the product and calculate the total price
        $product = Product::findOrFail($request->product_id);
        $total_price = $product->price * $request->quantity;

        // Create a new order
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        return response()->json($order, 201);
    }

    // GET: /api/orders/{id}
    public function show($id)
    {
        $order = Order::with(['customer', 'product'])->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order, 200);
    }

    // PUT: /api/orders/{id}
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Find the product and calculate the total price
        $product = Product::findOrFail($request->product_id);
        $total_price = $product->price * $request->quantity;

        // Update the order
        $order->update([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        return response()->json($order, 200);
    }

    // DELETE: /api/orders/{id}
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
