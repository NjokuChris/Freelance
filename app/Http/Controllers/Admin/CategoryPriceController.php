<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\category_price;
use App\Models\story_category;
use App\Models\story_formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryPriceController extends Controller
{
    public function index()
    {
        $price = category_price::all();
        $formation = story_formation::all();
        $category = story_category::all();
        return view('Admin.Price.index', ['price' => $price, 'formation' => $formation, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, category_price $price)
    {
        // $price->cat_price_name = story_category::where('id', $request->category_id)->select('category')->pluck('category')->first() . '_' . story_formation::where('id', $request->category_id)->select('formation')->pluck('formation')->first();
        if (category_price::where("category_id", $request->category_id)->exists() && category_price::where("formation_id", $request->formation_id)->exists()) {
            return back()->withInput()->with('status', 'Category price name already exists!');
        } else {
            $price->amount = $request->amount;
            $price->category_id = $request->category_id;
            $price->formation_id = $request->formation_id;
            $price->posted_by = Auth::id();
            $price->save();

            return redirect('admin/category-price');
        }
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
        category_price::whereId($id)->update([
            // 'cat_price_name' => $request->cat_price_name,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'formation_id' => $request->formation_id,
            'posted_by' => Auth::id()
        ]);

        return redirect('admin/category-price')->with('success', 'Category price is successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = category_price::findOrFail($id);
        $price->delete();

        return redirect('admin/category-price')->with('success', 'Category price is successfully deleted');
    }
}
