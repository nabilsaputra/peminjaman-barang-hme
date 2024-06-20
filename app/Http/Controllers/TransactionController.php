<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $rentLogs = Transaction::with('user', 'item')->get();
        return view('transaction', ['rentLogs' => $rentLogs]);
    }

    public function cetak()
    {
        $cetaks = Transaction::with('user', 'item')->get();
        return view('cetak', ['cetaks' => $cetaks]);
    }
}
