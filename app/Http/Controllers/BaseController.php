<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function Index()
    {
        return view('Template.index');
    }

    public function User(){
        $user = User::all();

        return view('Admin.User.user', compact('user'));
    }

    public function deleteUser(Request $request){

        $users = User::findOrFail($request->id);
        $users->name = $request->name;
        $users->delete();
        return redirect()->back()->with('Delete', "User $request->name Successfully Delete");
    }

}
