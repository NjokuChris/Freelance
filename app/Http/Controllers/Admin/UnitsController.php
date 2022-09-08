<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function index()
    {
        $unit = unit::all();
        return view('Admin.Unit.index', ['unit' => $unit]);
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
    public function store(Request $request, unit $unit)
    {
        $unit->unit_name = $request->unit_name;
        $unit->status = $request->status;
        $unit->save();

        return redirect('admin/units');
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
        unit::whereId($id)->update([
            'unit_name' => $request->unit_name,
            'status' => $request->status
        ]);

        return redirect('admin/units')->with('success', 'Units is successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = unit::findOrFail($id);
        $unit->delete();

        return redirect('admin/units')->with('success', 'Units is successfully deleted');
    }
}
