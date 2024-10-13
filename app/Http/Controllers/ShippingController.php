<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\Order;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        $shippings = Shipping::paginate(10);
        return view('shipping.index', compact('shippings'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('shipping.create', compact('orders'));
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

        Shipping::create($request->all());

        return redirect()->route('shippings.index')->with('success', 'Shipping created successfully.');
    }

    public function edit($id)
    {
        $shipping = Shipping::findOrFail($id);
        $orders = Order::all();
        return view('shipping.edit', compact('shipping', 'orders'));
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

        return redirect()->route('shippings.index')->with('success', 'Shipping updated successfully.');
    }

    public function destroy($id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->delete();

        return redirect()->route('shippings.index')->with('success', 'Shipping deleted successfully.');
    }
}
