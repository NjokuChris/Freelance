<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\category_price;
use App\Models\freelancer;
use App\Models\story;
use App\Models\story_category;
use App\Models\story_contributor;
use App\Models\story_formation;
use App\Models\User;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = story::paginate(5);
        $story_category = story_category::all();
        $story_formation = story_formation::all();
        $freelancers = freelancer::all();
        return view('Admin.Story.index', ['stories' => $stories, 'story_formation' => $story_formation, 'story_category' => $story_category, 'freelancers' => $freelancers]);
    }

    public function create()
    {
        $story_category = story_category::all();
        $story_formation = story_formation::all();
        $freelancers = freelancer::all();
        return view('Admin.Story.create', ['story_category' => $story_category, 'story_formation' => $story_formation, 'freelancers' => $freelancers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, story $story)
    {
        $request->validate([
            'title' => ['required'],
            'date_publish' => ['required'],
            'page_no' => ['required'],
            'category_id' => ['required'],
            'formation_id' => ['required'],
            'freelancers' => ['required']
        ]);
        $story->title = $request->title;
        $story->page_no = $request->page_no;
        $story->date_publish = $request->date_publish;
        $story->category_id = $request->category_id;
        $story->formation_id = $request->formation_id;
        $story->posted_by = Auth::id();

        $story->save();

        $amount = category_price::select('amount')
            ->where('category_id', $request->category_id)
            ->where('formation_id', $request->formation_id)
            ->pluck('amount')->first();

        $story->contributors()->attach($request->freelancers, ['amount' => $amount]);
        return redirect('admin/stories');
    }

    public function show($id)
    {
        $amount = [];
        $story = story::findOrFail($id);
        $freelancers = freelancer::all();
        foreach ($story->contributors as $contributor) {
            array_push($amount, $contributor->pivot->amount);
        }
        return view('Admin.Story.view', ['story' => $story, 'amount' => $amount, 'freelancers' => $freelancers]);
    }

    public function edit($id)
    {
        $story = story::findOrFail($id);
        $story_category = story_category::all();
        $story_formation = story_formation::all();
        $freelancers = freelancer::all();
        return view('Admin.Story.edit', ['story' => $story, 'story_formation' => $story_formation, 'story_category' => $story_category, 'freelancers' => $freelancers]);
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
        $request->validate([
            'title' => ['required'],
            'date_publish' => ['required'],
            'page_no' => ['required'],
            'category_id' => ['required'],
            'formation_id' => ['required'],
            'freelancers' => ['required']
        ]);
        $story = story::find($id);
        $story->contributors()->detach($request->freelancers);
        $story->update([
            'title' => $request->title,
            'page_no' => $request->page_no,
            'date_publish' => $request->date_publish,
            'category_id' => $request->category_id,
            'formation_id' => $request->formation_id,
            'posted_by' => Auth::id()
        ]);

        $amount = category_price::select('amount')
            ->where('category_id', $request->category_id)
            ->where('formation_id', $request->formation_id)
            ->pluck('amount')->first();

        $story->contributors()->attach($request->freelancers, ['amount' => $amount]);

        return redirect('admin/stories')->with('success', 'stories is successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = story::findOrFail($id);
        $price->delete();

        return redirect('admin/stories')->with('success', 'stories is successfully deleted');
    }
}
