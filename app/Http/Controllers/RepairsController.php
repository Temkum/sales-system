<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function create()
    {
        return view('admin.repairs.create');
    }

    // Store a new repair
    public function store(Request $request)
    {
        $repair = new Repair;
        $repair->name = $request->name;
        $repair->phone_number = $request->phone_number;
        $repair->save();

        return redirect('/repairs');
    }

    // Display a list of repairs
    public function index()
    {
        $repairs = Repair::all();

        return view('admin.repairs.index', ['repairs' => $repairs]);
    }

    // Display a specific repair
    public function show($id)
    {
        $repair = Repair::findOrFail($id);

        return view('admin.repairs.show', ['repair' => $repair]);
    }

    // Update a specific repair
    public function update(Request $request, $id)
    {
        $repair = Repair::findOrFail($id);
        $repair->name = $request->name;
        $repair->phone_number = $request->phone_number;
        $repair->save();

        return redirect()->route('repairs.index');
    }

    // Delete a specific repair
    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();

        return redirect()->route('repairs.index');
    }
}
