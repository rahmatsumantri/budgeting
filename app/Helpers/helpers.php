<?php

use Carbon\Carbon;
use App\Models\Income;
use App\Models\Balance;
use App\Models\Outcome;

function balance($date){
    // set tahun dan bulan
    $year = Carbon::createFromFormat('Y-m-d', $date)->format('Y');
    $month = Carbon::createFromFormat('Y-m-d', $date)->format('m');

    // ambil jumah pendapatan
    $income_total = Income::sum('budget');

    // ambil jumah pendapatan berdasarkan tahun dan bulan 
    $income_month = Income::whereMonth('date', '=', $month)
    ->whereYear('date', '=', $year)
    ->sum('budget');

    // ambil jumah pendapatan
    $outcome_total = Outcome::sum('budget');

    // ambil jumah pengeluaran berdasarkan tahun dan bulan 
    $outcome_month = Outcome::whereMonth('date', '=', $month)
    ->whereYear('date', '=', $year)
    ->sum('budget');

    // ambil data balance berdasarkan tahun dan bulan
    $balance = Balance::where([
        'month' => $month,
        'year' => $year,
    ])->first();

    // parameter array untuk balance
    $balance_param = [
        'month' => date('m'),
        'year' => date('Y'),
        'total_income' => $income_month,
        'total_outcome' => $outcome_month,
        'balance' => $income_total - $outcome_total
    ];

    // jika balance kosong maka buat baru jika tidak maka update yg lama
    if ($balance === null) {
        Balance::create($balance_param);
    } else {
        $balance->update($balance_param);
    }
}
