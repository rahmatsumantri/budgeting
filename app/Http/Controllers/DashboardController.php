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
        $from = date("Y-m-28", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
        $to = date('Y-m-27');

        $outcomes = Outcome::get();
        $incomes = Income::get();

        $income_total = Income::sum('budget');
        $outcome_total = Outcome::sum('budget');
        $balance = $income_total - $outcome_total;

        $outcome_month = Outcome::whereBetween('date', [$from, $to])->sum('budget');

        // render view
        return view('dashboard', compact('incomes', 'outcomes', 'balance', 'outcome_month'));
    }
}
