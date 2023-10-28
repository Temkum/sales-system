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
        $purchaseOrders = PurchaseOrder::orderBy('order_date', 'desc')->get();
        return view('admin.purchase_orders.index', compact('purchaseOrders'));
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

        $purchaseOrder = PurchaseOrder::create($request->all());

        foreach ($data['product'] as $index => $itemName) {
            $purchaseOrder->items()->create([
                'product' => $itemName,
                'quantity' => $data['quantity'][$index],
                'price' => $data['price'][$index],
            ]);
        }

        // return redirect()->route('purchase_orders.show', $purchaseOrder)
        //     ->with('success', 'Purchase order created successfully.');
        notyf()->addSuccess(__('Purchase order created successfully.'));
        return redirect()->route('purchase_orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder, PurchaseOrderItem $item)
    {
        $purchaseOrder->load('items');
        $grouped_items = $purchaseOrder->items->groupBy('purchase_order_id');

        return view('admin.purchase_orders.show', compact('purchaseOrder', 'item', 'grouped_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        return view('admin.purchase_orders.edit', compact('purchaseOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $request->validate([
            'order_number' => 'required|unique:purchase_orders,order_number,' . $purchaseOrder->id,
            'supplier' => 'required',
            'order_date' => 'required|date',
            'notes' => 'nullable',
        ]);

        $purchaseOrder->update($request->all());

        return redirect()->route('purchase_orders.show', $purchaseOrder)
            ->with('success', 'Purchase order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrderItem $purchaseOrderItem)
    {
        $purchaseOrder = $purchaseOrderItem->purchaseOrder;
        $purchaseOrderItem->delete();

        notyf()->addSuccess(__('Purchase order item deleted successfully.'));

        return redirect()->route('purchase_orders', $purchaseOrder);
    }
}
