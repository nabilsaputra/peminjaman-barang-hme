<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RentController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $items = Item::all();
        return view('item-rent', ['users' => $users, 'items' => $items]);
    }

    public function itemReturn()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $items = Item::all();
        // dd($items);
        return view('item-return', ['users' => $users, 'items' => $items]);
        
    }

    public function returnForm(Request $request)
    {
        $rent = Transaction::where('user_id', $request->user_id)->where('item_id', $request->item_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $item = Item::where('id', $request->item_id)->first();
        $countData = $rent->count();

        if($countData == 1){
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $item->status = 'in stock';
            $item->save();
            $rentData->save();

            Session::flash('message', 'Return item Successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('item-return');
        }
        else {
            Session::flash('message', 'The item is not matched or User already return the item');
            Session::flash('alert-class', 'alert-danger');
            return redirect('item-return');
        }

    }
}
