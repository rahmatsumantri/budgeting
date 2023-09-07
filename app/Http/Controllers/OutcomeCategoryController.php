<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutcomeCategory;

class OutcomeCategoryController extends Controller
{
    public function index()
    {
        $outcomeCategories = OutcomeCategory::get();

        return view('outcome-categories.index', compact('outcomeCategories'));
    }


    public function create()
    {
        return view('outcome-categories.create');
    }

    
    public function store(Request $request)
    {
        // validate request
        $this->validate($request, [
            'name'   => 'required'
        ]);


        // insert new OutcomeCategory to db
        OutcomeCategory::create([
            'name' => $request->name
        ]);

        //redirect to index
        return redirect()->route('outcome-categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
