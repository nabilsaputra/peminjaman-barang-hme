<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function index()
    {
        // $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $users = Auth::user();
        $items = Item::all();
        return view('item-rent', ['users' => $users, 'items' => $items]);
    }

    public function store(Request $request)
    {

        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $item = Item::findOrFail($request->item_id)->only('status');
        
        if($item['status'] != 'in stock'){
            Session::flash('message', 'Cannot Rent, the item is out stock');
            Session::flash('alert-class', 'alert-danger');
            return redirect('item-rent');
        }
        else{
            $count = Transaction::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if($count >= 3){
                Session::flash('message', 'Cannot Rent, User has reach limit of rent');
                Session::flash('alert-class', 'alert-danger');
                return redirect('item-rent');
            }
            else {
                try {
                    DB::beginTransaction();
                    // Transaction::create($request->all());
                    Transaction::create([
                        'user_id' => Auth::id(),
                        'item_id' => $request->item_id,
                        'rent_date' => $request['rent_date'],
                        'return_date' => $request['return_date'],
                    ]);
    
                    $item = Item::findOrFail($request->item_id);
                    $item->status = 'out stock';
                    $item->save();
                    DB::commit();
    
                    Session::flash('message', 'Rent item Successfully');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('item-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                    return redirect('item-rent');
                }
            }
        }
    }
}
