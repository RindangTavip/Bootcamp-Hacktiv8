<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all();
        // return view("biodata.list")->with("biodata", $biodata);

        return response()->json([
            'status' => 200,
            'message' => 'Success Get Biodata',
            'data' => $biodata
        ]);
    }

    public function create()
    {
        
    }

    public function edit($id)
    {
        $biodata = Biodata::find($id);
        // return view("biodata.edit")->with("biodata", $biodata);

        return response()->json([
            'status' => 200,
            'message' => 'Success Edit Biodata',
            'data' => $biodata
        ]);
 
    }

    public function store(Request $request)
    {
        $biodata = Biodata::create($request->all());
        // return redirect()->route('biodata.index');

        return response()->json([
            'status' => 200,
            'message' => 'Success Membuat Biodata',
            'data' => $biodata
        ]);

    }

    public function update($id, Request $request)
    {
        $biodata = Biodata::find($id)->update($request->all());
        // return redirect()->route('biodata.index');

        return response()->json([
            'status' => 200,
            'message' => 'Success Update Biodata',
            'data' => $biodata
        ]);
    }
    
    public function destroy($id)
    {
        $biodata = Biodata::find($id)->delete();
        // return redirect()->route('biodata.index');

        return response()->json([
            'status' => 200,
            'message' => 'Success Delete Biodata',
            'data' => $biodata
        ]);
    }
}
