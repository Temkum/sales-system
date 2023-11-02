<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;

class PurchaseOrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PurchaseOrder $purchase_order)
    {
        // dd($request->all());
        $data = $request->validate([
            'product' => 'required|array',
            'product.*' => 'required|string',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'price' => 'required|array',
            'price.*' => 'required|numeric|min:0',
        ]);

        foreach ($data['product'] as $index => $itemName) {
            $purchase_order->items()->create([
                'product' => $itemName,
                'quantity' => $data['quantity'][$index],
                'price' => $data['price'][$index],
            ]);
        }
        notyf()->addSuccess(__('Purchase order items added successfully.'));

        return redirect()->route('purchase_orders.show', $purchase_order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // dd($request->all());
        $data = $request->validate([
            'product' => 'required|array',
            'product.*' => 'required|string',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'price' => 'required|array',
            'price.*' => 'required|numeric|min:0',
        ]);
        dd($data);

        // Get the IDs of the existing purchase order items
        $existing_item_Ids = $purchase_order->items->pluck('id')->toArray();

        // Loop through the submitted data
        foreach ($data['product'] as $index => $itemName) {
            // Check if the submitted item already exists
            if (isset($existing_item_Ids[$index])) {
                $item = PurchaseOrderItem::find($existing_item_Ids[$index]);
                $item->update([
                    'product' => $itemName,
                    'quantity' => $data['quantity'][$index],
                    'price' => $data['price'][$index],
                ]);
            } else {
                // If the item doesn't exist, create a new one
                $purchase_order->items()->create([
                    'product' => $itemName,
                    'quantity' => $data['quantity'][$index],
                    'price' => $data['price'][$index],
                ]);
            }
        }

        notyf()->addSuccess(__('Purchase order items updated successfully.'));

        return redirect()->route('purchase_orders.show', $purchase_order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchase_order, PurchaseOrderItem $purchase_order_item)
    {
        $purchase_order_item->delete();

        notyf()->addSuccess(__('Purchase order item deleted successfully.'));

        return redirect()->route('purchase_orders.show', $purchase_order);
    }
}
