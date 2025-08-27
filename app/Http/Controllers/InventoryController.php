<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
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
        // query all inventories from the database
        $inventories = Inventory::latest()->get();

        // return the view with $inventories data
        return view('inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//DB::enableQueryLog();
        //dd(auth()->user()->id);
         $request->validate([
        'name' => 'required|string|max:255',
        'qty' => 'required|integer',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
    ]);

    // Simpan ke database
    Inventory::create([
        'name' => $request->name,
        'qty' => $request->qty,
        'price' => $request->price,
        'description' => $request->description,
        'user_id' => auth()->user()->id,
    ]);
//dd(DB::getQueryLog());
    return redirect()->route('inventory.index')->with('success', 'Inventory berjaya ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return view('inventories.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        // dd( $inventory);
        return view('inventories.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $inventory = Inventory::findOrFail($id);
        $inventory->update([
        'name' => $request->name,
        'qty' => $request->qty,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    return redirect()->route('inventory.index')->with('success', 'Inventory berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    // Cari rekod ikut ID
    $inventory = Inventory::findOrFail($id);

    // Padam rekod
    $inventory->delete();

    // Redirect balik dengan mesej berjaya
    return redirect()->route('inventory.index')->with('success', 'Inventory berjaya dipadam.');
}

}
