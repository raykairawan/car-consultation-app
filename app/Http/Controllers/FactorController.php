<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function index()
    {
        $factors = Factor::all();
        return view('admin.factors.index', compact('factors'));
    }

    public function create()
    {
        return view('admin.factors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'factor' => 'required|string|max:255',
        ]);

        Factor::create($request->all());
        return redirect()->route('admin.factors.index')->with('success', 'Factor created successfully.');
    }

    public function edit(Factor $factor)
    {
        return view('admin.factors.edit', compact('factor'));
    }

    public function update(Request $request, Factor $factor)
    {
        $request->validate([
            'factor' => 'required|string|max:255',
        ]);

        $factor->update($request->all());
        return redirect()->route('admin.factors.index')->with('success', 'Factor updated successfully.');
    }

    public function destroy(Factor $factor)
    {
        $factor->delete();
        return redirect()->route('admin.factors.index')->with('success', 'Factor deleted successfully.');
    }
}
