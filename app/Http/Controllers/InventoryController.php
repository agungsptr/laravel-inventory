<?php

namespace App\Http\Controllers;

use App\Category;
use App\Fund;
use App\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funds = Fund::all();
        $categories = Category::all();
        return view('inventory.create', [
            'funds' => $funds,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Inventory::create($request->all());
        $name = $request->get('name');
        return redirect()->route('inventory.create')->with('status', "Inventory \"$name\" berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funds = Fund::all();
        $categories = Category::all();
        $inventory = Inventory::findOrFail($id);
        return view('inventory.edit', [
            'inv' => $inventory,
            'funds' => $funds,
            'categories' => $categories,
        ]);
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
        $request->validate(
            [
                'inventory' => "required|max:191",
            ],
            [
                'inventory.required' => 'Inventory harus diisi',
                'inventory.max' => 'Inventory tidak boleh melebihi 191 karakter',
            ]
        );

        $inventory = inventory::findOrFail($id);
        $inventory->name = $request->get('inventory');
        $inventory->save();

        return redirect()->route('inventory.edit', ['inventory' => $inventory->id])->with('status', "Inventory \"$inventory->name\" berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = inventory::findOrFail($id);
        $val = $inventory->name;
        $inventory->delete();

        return redirect()->route('inventory.index')->with('status', "Inventory $val berhasil dihapus");
    }
}
