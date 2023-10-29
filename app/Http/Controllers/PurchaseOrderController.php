<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_orders = PurchaseOrder::orderBy('order_date', 'desc')->get();
        return view('admin.purchase_orders.index', compact('purchase_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.purchase_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_number' => 'required|unique:purchase_orders',
            'supplier' => 'required',
            'order_date' => 'required|date',
            'notes' => 'nullable',
        ]);

        $data = $request->validate([
            'product' => 'required|array',
            'product.*' => 'required|string',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'price' => 'required|array',
            'price.*' => 'required|numeric|min:0',
        ]);

        $purchase_order = PurchaseOrder::create($request->all());

        foreach ($data['product'] as $index => $itemName) {
            $purchase_order->items()->create([
                'product' => $itemName,
                'quantity' => $data['quantity'][$index],
                'price' => $data['price'][$index],
            ]);
        }

        notyf()->addSuccess(__('Purchase order created successfully.'));

        return redirect()->route('purchase_orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchase_order, PurchaseOrderItem $item)
    {
        $purchase_order->load('items');
        $grouped_items = $purchase_order->items->groupBy('purchase_order_id');

        return view('admin.purchase_orders.show', compact('purchase_order', 'item', 'grouped_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchase_order)
    {
        return view('admin.purchase_orders.edit', compact('purchase_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchase_order)
    {
        $request->validate([
            'order_number' => 'required|unique:purchase_orders,order_number,' . $purchase_order->id,
            'supplier' => 'required',
            'order_date' => 'required|date',
            'notes' => 'nullable',
        ]);

        $items_data = $request->validate([
            'product' => 'required|array',
            'product.*' => 'required|string',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'price' => 'required|array',
            'price.*' => 'required|numeric|min:0',
        ]);

        $purchase_order->update($request->all());

        foreach ($items_data['product'] as $index => $itemName) {
            dd('Update success');
            $purchase_order->items()->create([
                'product' => $itemName,
                'quantity' => $items_data['quantity'][$index],
                'price' => $items_data['price'][$index],
            ]);
        }

        notyf()->addSuccess(__('Purchase order updated successfully.'));

        return redirect()->route('purchase_orders.show', $purchase_order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrderItem $purchaseOrderItem)
    {
        $purchase_order = $purchaseOrderItem->purchase_order;
        $purchaseOrderItem->delete();

        notyf()->addSuccess(__('Purchase order item deleted successfully.'));

        return redirect()->route('purchase_orders', $purchase_order);
    }
}
