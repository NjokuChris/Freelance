<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category_price;
use App\Models\freelancer;
use App\Models\story;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('Admin.User.index', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:4'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);

        event(new Registered($user));

        return redirect('admin/users')->with('success', 'Users is successfully updated');
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
            'password' => ['required', 'confirmed', 'min:4'],
        ]);

        $user = User::whereId($id)->update([
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);

        event(new Registered($user));

        return redirect('admin/users')->with('success', 'Users is successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('admin/users')->with('success', 'users is successfully deleted');
    }

    public function dashboard()
    {
        $start = new Carbon('first day of this month');
        $now = Carbon::now();
        $stories = story::all();
        $freelancers = freelancer::all();
        $amount = category_price::select(
            DB::raw('sum(amount) as amount')
        )
            ->whereBetween(DB::raw('date(created_at)'), [$start, $now])
            ->first('amount');

        return view('Admin.index', [
            'stories' => $stories,
            'freelancers' => $freelancers,
            'amount' => $amount
        ]);
    }
}
