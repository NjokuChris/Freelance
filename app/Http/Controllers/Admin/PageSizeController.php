<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page_size;

class PageSizeController extends Controller
{
    //
    public function index()
    {
        $size = page_size::all();
        return view('Admin.PageSize.index', ['size' => $size]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, page_size $size)
    {
        $size->page_size = $request->page_size;
        $size->status = $request->status;
        $size->save();

        return redirect('admin/page-size');
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
        page_size::whereId($id)->update([
            'page_size' => $request->page_size,
            'status' => $request->status
        ]);

        return redirect('admin/page-size')->with('success', 'Page size is successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = page_size::findOrFail($id);
        $size->delete();

        return redirect('admin/page-size')->with('success', 'Page size is successfully deleted');
    }
}
