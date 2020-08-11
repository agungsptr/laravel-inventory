<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fund;

class FundController extends Controller
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
        return view('fund.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fund.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'fund' => "required|max:191",
            ],
            [
                'fund.required' => 'Dana harus diisi',
                'fund.max' => 'Dana tidak boleh melebihi 191 karakter',
            ]
        );

        $fund = new fund;
        $fund->name = $request->get('fund');
        $fund->save();

        return redirect()->route('fund.create')->with('status', "Dana \"$fund->name\" berhasil ditambahkan");
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
        $fund = fund::findOrFail($id);
        return view('fund.edit', ['fund' => $fund]);
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
                'fund' => "required|max:191",
            ],
            [
                'fund.required' => 'Dana harus diisi',
                'fund.max' => 'Dana tidak boleh melebihi 191 karakter',
            ]
        );

        $fund = fund::findOrFail($id);
        $fund->name = $request->get('fund');
        $fund->save();

        return redirect()->route('fund.edit', ['fund' => $fund->id])->with('status', "Dana \"$fund->name\" berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fund = fund::findOrFail($id);
        $val = $fund->name;
        $fund->delete();

        return redirect()->route('fund.index')->with('status', "Dana $val berhasil dihapus");
    }
}
