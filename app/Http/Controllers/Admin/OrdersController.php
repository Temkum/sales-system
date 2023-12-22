<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $items = json_decode($order->items);
        $client = Client::find($order->client_id);

        // get client's total orders
        $total_orders = $client->orders->count();

        return response()->view(
            'admin.show-details',
            ['order' => $order, 'items' => $items, 'client' => $client, 'total_orders' => $total_orders]
        );
    }


    public function showClientOrders(Client $client)
    {
        $orders = $client->orders;

        return view('livewire.admin.client-orders', ['orders' => $orders, 'client' => $client]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('orders');
    }

    public function deleteOrder($id)
    {
        $item = Order::find($id);
        $item->delete();

        return redirect()->route('orders');
    }
}
