<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index()
    {
        $order =  Order::join('customer','order.customer_id','=','customer.customer_id')
                ->join('product','order.product_id','=','product.product_id')
                ->select([ 'order.order_id','order.order_status','customer.customer_fullname','product.product_name','order.order_quantity','order.order_total','order.order_date'])->paginate(5);

        return view('order_list',compact('order'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $customer =  Customer::all();
        $product = Product::all();
        return view('order_add',compact('customer','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            
            Order::create($request->all());

            return redirect()->route('order.index')->with('success','Successfully to create new customer');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('order.index')->with('error',$th->getMessage());
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
        $customer =  Customer::all();
        $product = Product::all();

        $order =  
        Order::join('customer','order.customer_id','=','customer.customer_id')
        ->join('product','order.product_id','=','product.product_id')
        ->where('order_id',$id)
        ->select([ 'order.order_id as order_id','order.order_status as order_status','customer.customer_fullname as customer_fullname','customer.customer_id as customer_id','product.product_id','product.product_name as product_name','order.order_quantity as order_quantity','product.price as price','order.order_total as order_total','order.order_date as order_date'])
        ->firstOrFail();

        if($order){

            return view('order_edit',compact('order','customer','product'));
        }else{
            return redirect()->route('order.index')->with('error','Order not found');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        Order::where('order_id',$id)->update([
            'customer_id'=> $request->customer_id,
            'product_id'=> $request->product_id,
            'order_status'=> $request->order_status,
            'order_quantity'=> $request->order_quantity,
            'order_total'=> $request->order_total,
            'order_date'=> $request->order_date
        ]);


        return redirect()->route('order.index')->with('success','Successfully update data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Order::where('order_id',$id)->delete();

        return redirect()->route('order.index')->with('success','Successfully delete data');
    }

    public function getOrderId(){

        $randomString = uniqid("order_");

        return response()->json([
            'key'=>$randomString
        ]);
     }
}