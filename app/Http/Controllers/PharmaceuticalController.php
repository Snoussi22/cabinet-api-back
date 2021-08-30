<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmaceutical;
use App\Http\Requests\UpdatePharmaceuticalRequest;
use App\Http\Requests\PostPharmaceuticalRequest;

class PharmaceuticalController extends Controller
{
    //
    public function index()
    {
        $pharmaceutical = Pharmaceutical::get();
        return response()->json($pharmaceutical,200);
    }

    public function destroy($id)
    {
        $pharmaceutical = Pharmaceutical::find($id);
        $pharmaceutical->delete();
        return response()->json($pharmaceutical,204);
    }

    public function find($id)
    {
        $pharmaceutical = Pharmaceutical::find($id);
        return response()->json($pharmaceutical,200);

    }
    
    public function update(UpdatePharmaceuticalRequest $request, int $id)
    {
        $pharmaceutical = Pharmaceutical::find($id);
        $pharmaceutical->name_m = $request->name_m;
        $pharmaceutical->prescription_id = $request->prescription_id;
        $pharmaceutical->save();
        return response()->json($pharmaceutical,200);
    }

    

    public function store(PostPharmaceuticalRequest $request)
    {
        $pharmaceutical = new Pharmaceutical;
        $pharmaceutical->name_m = $request->name_m;
        $pharmaceutical->prescription_id = $request->prescription_id;
        $pharmaceutical->save();
        return response()->json($pharmaceutical,201);
    }
}
