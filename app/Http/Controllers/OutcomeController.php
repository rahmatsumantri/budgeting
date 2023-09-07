<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Outcome;
use App\Models\OutcomeCategory;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    /**
     *  display form create
    */
    public function create()
    {
        // render view
        $outcomeCategories = OutcomeCategory::get();
        return view('outcomes.create', compact('outcomeCategories'));
    }

     /**
     *  insert new data
     */
    public function store(Request $request)
    {
        // validate request
        $this->validate($request, [
            'date'  =>  'required',
            'outcome_category_id'   =>  'required',
            'name'  =>  'required',
            'budget'  =>  'required'
        ]);


        // insert new data to db
        Outcome::create([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'outcome_category_id' => $request->outcome_category_id,
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
    public function edit(Outcome $outcome)
    {
        // render view
        $outcomeCategories = OutcomeCategory::get();
        $outcome->date = Carbon::createFromFormat('Y-m-d', $outcome->date)->format('d/m/Y');
        return view('outcomes.edit', compact('outcome', 'outcomeCategories'));
    }

    /**
     *  update data by id
     */
    public function update(Outcome $outcome, Request $request)
    {
        // validate request
        $this->validate($request, [
            'date'  =>  'required',
            'outcome_category_id'   =>  'required',
            'name'  =>  'required',
            'budget'  =>  'required'
        ]);

        // update post data by id
        $outcome->update([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'outcome_category_id' => $request->outcome_category_id,
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
    public function destroy(Outcome $outcome)
    {
        // delete data by id
        $outcome->delete();

        // render view
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
