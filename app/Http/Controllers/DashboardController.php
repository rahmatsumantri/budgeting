<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Income;
use App\Models\Outcome;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // get data
        $outcomes = Outcome::get();
        $incomes = Income::get();
        
        $balance = Balance::where([
            'month' => date('m'),
            'year' => date('Y'),
        ])->first();

        // render view
        return view('dashboard', compact('incomes', 'outcomes', 'balance'));
    }
}
