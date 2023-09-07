<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutcomeCategory;

class OutcomeCategoryController extends Controller
{
    /**
     * display all post data
     */
    public function index()
    {
        // get all data
        $outcomeCategories = OutcomeCategory::get();

        // render view
        return view('outcome-categories.index', compact('outcomeCategories'));
    }

    /**
     *  display form create
    */
    public function create()
    {
        // render view
        return view('outcome-categories.create');
    }

     /**
     *  insert new data
     */
    public function store(Request $request)
    {
        // validate request
        $this->validate($request, [
            'name'   => 'required'
        ]);


        // insert new data to db
        OutcomeCategory::create([
            'name' => $request->name
        ]);

        // render view
        return redirect()->route('outcome-categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     *  display form edit
     */
    public function edit(OutcomeCategory $outcomeCategory)
    {
        // render view
        return view('outcome-categories.edit', compact('outcomeCategory'));
    }

    /**
     *  update data by id
     */
    public function update(OutcomeCategory $outcomeCategory, Request $request)
    {
        // validate request
        $this->validate($request, [
            'name'     => 'required'
        ]);

        // update post data by id
        $outcomeCategory->update([
            'name' => $request->name
        ]);

        // render view
        return redirect()->route('outcome-categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     *  delete data by id
     */
    public function destroy(OutcomeCategory $outcomeCategory)
    {
        // delete data by id
        $outcomeCategory->delete();

        // render view
        return redirect()->route('outcome-categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
