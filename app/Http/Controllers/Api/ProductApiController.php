<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    // GET: /api/products
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json($products, 200);
    }

    // POST: /api/products
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $request->all();

        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->picture->extension();
            // Store picture in storage/app/public/products
            $request->picture->storeAs('public/products', $fileName);
            $data['picture'] = $fileName;
        }

        // Create a new product
        $product = Product::create($data);

        return response()->json($product, 201);
    }

    // GET: /api/products/{id}
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product, 200);
    }

    // PUT: /api/products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $request->all();

        if ($request->hasFile('picture')) {
            // Delete old image if it exists
            if ($product->picture && Storage::exists('public/products/' . $product->picture)) {
                Storage::delete('public/products/' . $product->picture);
            }

            // Store new picture
            $fileName = time() . '.' . $request->picture->extension();
            $request->picture->storeAs('public/products', $fileName);
            $data['picture'] = $fileName;
        }

        // Update product
        $product->update($data);

        return response()->json($product, 200);
    }

    // DELETE: /api/products/{id}
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Delete product image if it exists
        if ($product->picture && Storage::exists('public/products/' . $product->picture)) {
            Storage::delete('public/products/' . $product->picture);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
