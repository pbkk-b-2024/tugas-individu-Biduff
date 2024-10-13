<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use App\Models\Order;
use Illuminate\Http\Request;

class ShippingApiController extends Controller
{
    public function index()
    {
        return response()->json(Shipping::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'order_id' => 'required|exists:orders,id'
        ]);

        $shipping = Shipping::create($request->all());
        return response()->json($shipping, 201);
    }

    public function show($id)
    {
        $shipping = Shipping::findOrFail($id);
        return response()->json($shipping, 200);
    }

    public function update(Request $request, $id)
    {
        $shipping = Shipping::findOrFail($id);

        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'order_id' => 'required|exists:orders,id'
        ]);

        $shipping->update($request->all());
        return response()->json($shipping, 200);
    }

    public function destroy($id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->delete();
        return response()->json(null, 204);
    }
}
