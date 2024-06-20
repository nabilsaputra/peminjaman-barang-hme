<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $rentLogs = Transaction::with('user', 'item')->where('user_id', Auth::user()->id)->get();        
        return view('profile', ['rentLogs' => $rentLogs]);
    }

    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('users', ['users' => $users]);
    }

    public function inactiveUsers()
    {
        $inactiveUsers = User::where('role_id', 2)->where('status', 'inactive')->get();
        return view('inactive-users', ['inactiveUsers' => $inactiveUsers]);
    }

    public function show($slug)
    {
        $user = User::where('slug',$slug)->first();
        $rentLogs = Transaction::with('user', 'item')->where('user_id', $user->id)->get();
        return view('user-detail', ['user' => $user, 'rentLogs' => $rentLogs]);
    }

    public function approve($slug)
    {
        $user = User::where('slug',$slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user-detail/'.$slug)->with('status', 'User Approved Succesfully');
    }

    public function delete($slug)
    {
        $user = User::where('slug',$slug)->first();
        return view('user-ban',  ['user' => $user] );

    }

    public function trash($slug)
    {
        $user = User::where('slug',$slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'User Banned Succesfully');
    }

    public function userBanned()
    {
        $usersBanned = User::onlyTrashed()->get();
        return view('user-banned', ['usersBanned' => $usersBanned]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug',$slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'User Restored Succesfully');
    }

}
