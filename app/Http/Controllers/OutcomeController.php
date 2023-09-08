<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Outcome;
use Illuminate\Http\Request;
use App\Models\OutcomeCategory;
use Illuminate\Support\Facades\Storage;

class OutcomeController extends Controller
{
    /**
     *  display form create
    */
    public function create()
    {
        // get all data
        $outcomeCategories = OutcomeCategory::get();

        // render view
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
            'outcome_category_id'  =>  'required',
            'name'  =>  'required',
            'budget'  =>  'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //upload image
        if($request->file('image') == "") {
            $image_name = 'no_image.webp';  
        }else{
            $image = $request->file('image');
            $image->storeAs('public/outcomes', $image->hashName());
            $image_name = $image->hashName();
        }
        

        // insert new data to db
        Outcome::create([
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'outcome_category_id' => $request->outcome_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image_name,
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
        // get data
        $outcomeCategories = OutcomeCategory::get();
        $outcome->date = Carbon::createFromFormat('Y-m-d', $outcome->date)->format('d/m/Y');

        // render view
        return view('outcomes.edit', compact('outcomeCategories', 'outcome'));
    }

    /**
     *  update data by id
     */
    public function update(Outcome $outcome, Request $request)
    {
        // validate request
        $this->validate($request, [
            'date'  =>  'required',
            'outcome_category_id'  =>  'required',
            'name'  =>  'required',
            'budget'  =>  'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // update post data by id
        if($request->file('image') == "") {

            $outcome->update([
                'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
                'outcome_category_id' => $request->outcome_category_id,
                'name' => $request->name,
                'description' => $request->description,
                'budget' => (int)str_replace('.', '', $request->budget)
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/outcomes/'.$outcome->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/outcomes', $image->hashName());
            $image_name = $image->hashName();
    
            $outcome->update([
                'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
                'outcome_category_id' => $request->outcome_category_id,
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image_name,
                'budget' => (int)str_replace('.', '', $request->budget)
            ]);
    
        }

        // render view
        if($outcome){
            //redirect dengan pesan sukses
            return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('dashboard')->with(['error' => 'Data Gagal Diupdate!']);
        }
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
