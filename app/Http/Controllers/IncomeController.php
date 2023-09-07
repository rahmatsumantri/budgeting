<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Carbon\Carbon;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     *  display form create
    */
    public function create()
    {
        // render view
        return view('incomes.create');
    }

     /**
     *  insert new data
     */
    public function store(Request $request)
    {
        // validate request
        $this->validate($request, [
            'date'  =>  'required',
            'name'  =>  'required',
            'budget'  =>  'required'
        ]);


        // insert new data to db
        Income::create([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'name' => $request->name,
            'description' => $request->description,
            'budget' => (int)str_replace('.', '', $request->budget)
        ]);
        
        // render view
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     *  display form edit
     */
    public function edit(Income $income)
    {
        // render view
        $income->date = Carbon::createFromFormat('Y-m-d', $income->date)->format('d/m/Y');
        return view('incomes.edit', compact('income'));
    }

    /**
     *  update data by id
     */
    public function update(Income $income, Request $request)
    {
        // validate request
        $this->validate($request, [
            'date'  =>  'required',
            'name'  =>  'required',
            'budget'  =>  'required'
        ]);

        // update post data by id
        $income->update([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'name' => $request->name,
            'description' => $request->description,
            'budget' => (int)str_replace('.', '', $request->budget)
        ]);

        // render view
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     *  delete data by id
     */
    public function destroy(Income $income)
    {
        // delete data by id
        $income->delete();

        // render view
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
