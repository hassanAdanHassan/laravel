<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoryModel;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $category = categoryModel::all();
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $validated = $request->validate([
        'name' => 'required|string|max:255',
        'descr'=>'required|string|max:255',
        'slug'=>['required','string'],
        'amount'=> ['required','int'],
    ]);
          
    //    $data['user_id'] = auth()->id();
          
        // print_r( $validated);
         $category = categoryModel::create($validated);

        return redirect()->route('category.show', compact('category'))->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(categoryModel $category)
    {
        //  print($category);
       
    //    return view('categories.show', compact('category'));
        // if (!Gate::allows('viewAny')) {
        //     abort(403, 'You do not have access to the admin panel.');
        // }
        $category = categoryModel::all();
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = categoryModel::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'descr' => 'required|string',
            'slug' => 'required|string|max:255|unique:category_models,slug,' . $id,
            'amount' => 'required|numeric',
        ]);

        // $category = categoryModel::findOrFail($id);
        // $category->update($data);
     print_r($data);
        // return redirect()->route('category.show', compact('category'))->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = categoryModel::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
