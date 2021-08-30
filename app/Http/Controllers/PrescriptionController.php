<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Http\Requests\PostPrescriptionRequest;

class PrescriptionController extends Controller
{
    //
    public function index()
    {
        $prescription = Prescription::get();
        return response()->json($prescription,200);
    }

    public function destroy($id)
    {
        $prescription = Prescription::find($id);
        $prescription->delete();
        return response()->json($prescription,204);
    }

    public function recherche($id)
    {
        $prescription = Prescription::find($id);
        return response()->json($prescription,200);

    }
    
    public function update(UpdatePrescriptionRequest $request, int $id)
    {
        $prescription = Prescription::find($id);
        $prescription->date = $request->date;
        $prescription->user_id = $request->user_id;
        $prescription->save();

        return response()->json($prescription,200);
    }

    

    public function store(PostPrescriptionRequest $request)
    {
        $prescription = new Prescription;
        $prescription->date = $request->date;
        $prescription->user_id = $request->user_id;
        $prescription->save();

        return response()->json($prescription,200);
    }
}
