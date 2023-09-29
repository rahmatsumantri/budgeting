<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Income;
use App\Models\Outcome;
use App\Models\OutcomeCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // init data date_form - date_to
        $day = '28';
        if( date('d') < $day) {
            $from = date("Y-m-" . $day, strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
            $to = date("Y-m-" . $day - 1);
        } else {
            $from = date("Y-m-") . $day;
            $to = date("Y-m-" . $day - 1, strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ));
        }

        // get data
        $outcomes = Outcome::get();
        $incomes = Income::get();

        $income_keropak = Income::where('name', 'keropak')->sum('budget');
        $income_total = Income::sum('budget') - $income_keropak;
        
        $outcome_category_keropak = OutcomeCategory::where('name', 'keropak')->first()->id ?? 0;
        $outcome_keropak = Outcome::where('outcome_category_id', $outcome_category_keropak)->sum('budget');
        $outcome_total = Outcome::sum('budget') - $outcome_keropak;

        $balance = $income_total - $outcome_total;
        $balance_keropak = $income_keropak - $outcome_keropak;

        $outcome_month = Outcome::whereBetween('date', [$from, $to])->sum('budget');
        $outcome_day = Outcome::where('date', date("Y-m-d"))->sum('budget');

        // render view
        return view('dashboard', compact(
            'incomes', 
            'outcomes', 
            'balance_keropak',
            'balance', 
            'outcome_keropak', 
            'outcome_month', 
            'outcome_day'
        ));
    }
}
