<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use WithPagination;

    public Int $page_number;
    public $current_page;
    public $search;

    public function index()
    {
        $repairs = Repair::all();

        $this->page_number = 15;
        $this->page = $this->current_page;

        $repairs = Repair::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone_number', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'DESC')->paginate($this->page_number);

        return view('admin.repairs.index', ['repairs' => $repairs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.repairs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repair = new Repair;
        $repair->name = $request->name;
        $repair->phone_number = $request->phone_number;
        $repair->save();

        notyf()->addSuccess(__("Added successfully!"));

        return redirect()->route('repairs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repair = Repair::findOrFail($id);

        return response()->view('admin.repairs.show', ['repair' => $repair]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repair = Repair::findOrFail($id);

        return response()->view('admin.repairs.edit', ['repair' => $repair]);
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
        $repair = Repair::findOrFail($id);
        $repair->name = $request->name;
        $repair->phone_number = $request->phone_number;
        $repair->save();

        notyf()->addSuccess(__("Updated successfully!"));

        return redirect()->route('repairs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();

        notyf()->addSuccess(__("Deleted successfully!"));

        return redirect()->route('repairs.index');
    }
}
