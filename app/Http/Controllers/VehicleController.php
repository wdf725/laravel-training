<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /// query all inventories from the database
        $vehicles = Vehicle::latest()->get();

        // return the view with $inventories data
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'name' => 'required|string|max:255',
        'qty' => 'required|integer',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
    ]);

    // Simpan ke database
    Vehicle::create([
        'name' => $request->name,
        'qty' => $request->qty,
        'price' => $request->price,
        'description' => $request->description,
        'user_id' => auth()->user()->id,
    ]);

    return redirect()->route('vehicle.index')->with('success', 'Vehicle berjaya ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {

        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $vehicle = Vehicle::findOrFail($id);
        $vehicle->update([
        'name' => $request->name,
        'qty' => $request->qty,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    return redirect()->route('vehicle.index')->with('success', 'Vehicle berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    // Cari rekod ikut ID
    $vehicle = Vehicle::findOrFail($id);

    // Padam rekod
    $vehicle->delete();

    // Redirect balik dengan mesej berjaya
    return redirect()->route('vehicle.index')->with('success', 'Vehicle berjaya dipadam.');
}
}
