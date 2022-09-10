<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $stories = story::all();
        $story_category = story_category::all();
        $story_formation = story_formation::all();
        $users = User::all();
        $freelancers = freelancer::all();
        return view('Admin.Story.index', ['stories' => $stories, 'story_formation' => $story_formation, 'users' => $users, 'story_category' => $story_category, 'freelancers' => $freelancers]);
    }

    public function create()
    {
        $story_category = story_category::all();
        $story_formation = story_formation::all();
        $users = User::all();
        $freelancers = freelancer::all();
        return view('Admin.story.create', ['story_category' => $story_category, 'users' => $users, 'story_formation' => $story_formation, 'freelancers' => $freelancers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, story $story)
    {
        $story->title = $request->title;
        $story->page_no = $request->page_no;
        $story->date_publish = $request->date_publish;
        $story->category_id = $request->category_id;
        $story->formation_id = $request->formation_id;
        $story->posted_by = $request->posted_by;
        $story->save();

        $this->storeContributors($request, $story);
        return redirect('admin/stories');
    }

    public function storeContributors($request, $story)
    {
        $amount = $this->amount($request);
        foreach ($request->freelancers as $freelancer) {
            story_contributor::create([
                'story_id' => $story->id,
                'freelancer_id' => $freelancer,
                'amount' => $amount
            ]);
        }
    }

    public function amount($request)
    {
        $count = count($request->freelancers);

        if ($count < 2) {
            return 2000;
        } else {
            return 1000;
        }
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
        $users = User::all();
        $freelancers = freelancer::all();
        return view('Admin.Story.edit', ['story' => $story, 'story_formation' => $story_formation, 'users' => $users, 'story_category' => $story_category, 'freelancers' => $freelancers]);
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
        story::whereId($id)->update([
            'title' => $request->title,
            'page_no' => $request->page_no,
            'date_publish' => $request->date_publish,
            'category_id' => $request->category_id,
            'formation_id' => $request->formation_id,
            'posted_by' => $request->posted_by
        ]);

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
