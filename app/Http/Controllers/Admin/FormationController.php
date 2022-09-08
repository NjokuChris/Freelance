<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category_price;
use App\Models\story_category;
use App\Models\story_formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    //
    public function index()
    {
        $formation = story_formation::all();
        return view('Admin.formation.index', ['formation' => $formation]);
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
    public function store(Request $request, story_formation $formation)
    {
        $formation->formation = $request->formation;
        $formation->status = $request->status;
        $formation->save();

        return redirect('admin/formation');
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
        story_formation::whereId($id)->update([
            'formation' => $request->formation,
            'status' => $request->status
        ]);
        // $formation->formation = $request->formation;
        // $formation->status = $request->status;
        // $formation->save();

        return redirect('admin/formation')->with('success', 'Formation is successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = story_formation::findOrFail($id);
        $formation->delete();

        return redirect('admin/formation')->with('success', 'Formation is successfully deleted');
    }
}
