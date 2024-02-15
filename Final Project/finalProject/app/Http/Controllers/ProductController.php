<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::latest()->paginate(5);

        return view('product_list',compact('product'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category =  Category::all();
        return view('product_add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $imageName =  $request->image->getClientOriginalName();
            $request->image->move(public_path('images'),$imageName);

            Product::create([
                'product_name'=>$request->product_name,
                'product_desc'=>$request->product_desc,
                'category_name'=>$request->category_name,
                'status'=>$request->status,
                'price'=>$request->price,
                'weight'=>$request->weight,
                'image'=>$imageName
            ]);

            return redirect()->route('product.index')->with('success','Successfully to create new product');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('product.index')->with('error',$th->getMessage());
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
        //
        $category =  Category::all();

        $product = Product::where('product_id',$id)->firstOrFail();

        if($product){
            return view('product_edit',compact('product','category'));
        }else{
            return redirect()->route('product.index')->with('error','Product not found');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        if(!$request->image){
            Product::where('product_id',$id)->update([
                'product_name'=> $request->product_name,
                'category_name'=>$request->category_name,
                'product_desc'=> $request->product_desc,
                'status'=> $request->status,
                'price'=> $request->price,
                'weight'=> $request->weight,
            ]);
        } else{
            $imageName =  $request->image->getClientOriginalName();
            $request->image->move(public_path('images'),$imageName);
            Product::where('product_id',$id)->update([
                'product_name'=> $request->product_name,
                'category_name'=>$request->category_name,
                'product_desc'=> $request->product_desc,
                'status'=> $request->status,
                'price'=> $request->price,
                'weight'=> $request->weight,
                'image'=> $imageName
            ]);
        }

        return redirect()->route('product.index')->with('success','Successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Product::where('product_id',$id)->delete();

        return redirect()->route('product.index')->with('success','Successfully delete data');
    }

    public function getProductById(Request $request){
        $product =  Product::where('product_id',$request->id)->firstOrFail();

        return response()->json([
            'product'=>$product
        ]);
    }
}