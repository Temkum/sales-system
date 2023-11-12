<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairs = Repair::all();

        return view('admin.repairs.index', ['repairs' => $repairs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.repairs.create');
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

        return view('admin.repairs.show', ['repair' => $repair]);
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

        return view('admin.repairs.edit', ['repair' => $repair]);
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

        return redirect()->route('repairs.index');
    }
}
