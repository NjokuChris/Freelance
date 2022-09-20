<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\freelancer;
use App\Models\state;
use App\Models\unit;
use App\Models\User;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index()
    {
        $freelancers = freelancer::paginate(5);
        $units = unit::all();
        $locations = state::all();
        return view('Admin.Freelancers.index', ['freelancers' => $freelancers, 'units' => $units, 'locations' => $locations]);
    }

    public function create()
    {
        $units = unit::all();
        $locations = state::all();
        return view('Admin.Freelancers.create', ['units' => $units, 'locations' => $locations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, freelancer $freelancer)
    {
        $freelancer->f_name = $request->f_name;
        $freelancer->m_name = $request->m_name;
        $freelancer->l_name = $request->l_name;
        $freelancer->unit_id = $request->unit_id;
        $freelancer->location_id = $request->location_id;
        $freelancer->posted_by = Auth::id();
        $freelancer->full_name = $request->f_name . ' ' . $request->m_name . ' ' . $request->l_name;
        $freelancer->save();

        return redirect('admin/freelancers');
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
        freelancer::whereId($id)->update([
            'f_name' => $request->f_name,
            'm_name' => $request->m_name,
            'l_name' => $request->l_name,
            'unit_id' => $request->unit_id,
            'location_id' => $request->location_id,
            'posted_by' => Auth::id(),
            'full_name' => $request->f_name . ' ' . $request->m_name . ' ' . $request->l_name
        ]);

        return redirect('admin/freelancers')->with('success', 'Freelancers is successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = freelancer::findOrFail($id);
        $price->delete();

        return redirect('admin/freelancers')->with('success', 'Freelancers is successfully deleted');
    }
}
