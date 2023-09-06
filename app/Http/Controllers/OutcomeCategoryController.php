<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutcomeCategory;

class OutcomeCategoryController extends Controller
{
    public function index()
    {
        $outcomeCategories = OutcomeCategory::get();

        return view('outcome-category.index', compact('outcomeCategories'));
    }

    public function create()
    {
        return view('outcome-category.create');
    }

    public function store(Request $request)
    {
        // validate request
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);


        // insert new post to db
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image->hashName(),
        ]);

        // render view
        return redirect(route('posts.index'));
    }
}
