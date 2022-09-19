<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_number = 13;

        $orders = Order::paginate($page_number);

        return view('admin.orders', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $validated_data = $request->validated();

        $new_order = new Order();
        $order = $new_order->create($validated_data);

        # check if order was created successfully
        if ($order) {
            $request->session()->flash('success', "Order created successfully!");

            return redirect(route('orders'));
        } else {
            $request->session()->flash('error', "Ops! Something went wrong. Please try again later.");

            return redirect(route('add-order'));
        }
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
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $output = null;

        $orders = Order::where('name', 'LIKE', '%' . $request->search . '%')->orWhere('price', 'LIKE', '%' . $request->search . '%')->orWhere('due_date', 'LIKE', '%' . $request->search . '%')->get();

        foreach ($orders as $key => $order) {

            $output .= ' 
            <tr>
                <td>' . ++$key . '</td>
                <td>' . $order->name . '</td>
                <td><strong>' . $order->price . '</strong></td>
                <td>' . date('d-m-Y', strtotime($order->due_date)) . '</td>
                <td>' . $order->advance . '</td>
                <td><span class="badge bg-label-primary me-1">' . $order->status . '</span></td>
                <td>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                            data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu action-btns">
                        <a class="dropdown-item" href="javascript:void(0);"><i
                                    class="bx bx-edit-alt me-1"></i>
                                Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i
                                    class="bx bx-trash me-1"></i>
                                Delete</a>
                        </div>
                </td>
            </tr>';
        };

        return response($output);
    }

    public function dateSearch(Request $request)
    {
        // $orders = Order::paginate(10);

        if ($request->start_date || $request->end_date) {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();

            $orders = Order::whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $orders = Order::latest()->get();
        }


        return view('admin.orders', ['orders' => $orders]);
    }
}