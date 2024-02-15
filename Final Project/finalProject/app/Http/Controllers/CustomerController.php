<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer =  Customer::latest()->paginate(5);
        return view('customer_list',compact('customer'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            Customer::create($request->all());
            return redirect()->route('customer.index')->with('success','Successfully to create new customer');
        } catch (\Throwable $th) {
            return redirect()->route('customer.index')->with('error',$th->getMessage());
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
        $customer =  Customer::where('customer_id',$id)->firstOrFail();
        if($customer){
            return view('customer_edit',compact('customer'));
        }else{
            return redirect()->route('customer.index')->with('error','Customer not found');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Customer::where('customer_id',$id)->update([
            'customer_fullname'=> $request->customer_fullname,
            'customer_email'=> $request->customer_email,
            'customer_gender'=> $request->customer_gender,
            'customer_address'=> $request->customer_address,
            'customer_phone'=> $request->customer_phone
        ]);


        return redirect()->route('customer.index')->with('success','Successfully update data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Customer::where('customer_id',$id)->delete();

        return redirect()->route('customer.index')->with('success','Successfully delete data');
    }

    public function getCustomerById(Request $request){
        $customer =  Customer::where('customer_id',$request->id)->firstOrFail();
        return response()->json([
            'customer'=>$customer
        ]);
     }
}