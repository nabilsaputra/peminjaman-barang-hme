<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
   public function index()
   {
    $items = Item::all();
    return view('item-list', ['items' => $items]);
   }
}
