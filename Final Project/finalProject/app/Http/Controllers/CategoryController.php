<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category =  Category::latest()->paginate(5);
        return view('category_list',compact('category'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            Category::create($request->all());
            return redirect()->route('category.index')->with('success','Successfully to create new category');
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category =  Category::where('category_id',$id)->firstOrFail();
        if($category){
            return view('category_edit',compact('category'));
        }else{
            return redirect()->route('category.index')->with('error','Category not found');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Category::where('category_id',$id)->update([
            'category_name'=> $request->category_name
        ]);


        return redirect()->route('category.index')->with('success','Successfully update data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::where('category_id',$id)->delete();

        return redirect()->route('category.index')->with('success','Successfully delete data');
    }

    public function getCategoryById(Request $request){
        $category =  Category::where('category_id',$request->id)->firstOrFail();
        return response()->json([
            'category'=>$category
        ]);
    }
}