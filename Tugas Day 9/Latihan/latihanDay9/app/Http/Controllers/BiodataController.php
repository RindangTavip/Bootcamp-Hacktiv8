<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all();
        return view("biodata.list")->with("biodata", $biodata);
    }

    public function create()
    {
        return view("biodata.create");
    }

    public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view("biodata.edit")->with("biodata", $biodata);
    }

    public function store(Request $request)
    {
        Biodata::create($request->all());
        return redirect()->route('biodata.index');
    }

    public function update($id, Request $request)
    {
        Biodata::find($id)->update($request->all());
        return redirect()->route('biodata.index');
    }
    
    public function destroy($id)
    {
        Biodata::find($id)->delete();
        return redirect()->route('biodata.index');
    }
}
