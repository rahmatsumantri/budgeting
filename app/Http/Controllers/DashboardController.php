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

        $income_total = Income::sum('budget');
        $outcome_total = Outcome::sum('budget');
        $balance = $income_total - $outcome_total;

        $outcome_month = Outcome::whereMonth('date', '=', date('m'))
            ->whereYear('date', '=', date('Y'))
            ->sum('budget');

        // render view
        return view('dashboard', compact('incomes', 'outcomes', 'balance', 'outcome_month'));
    }
}
