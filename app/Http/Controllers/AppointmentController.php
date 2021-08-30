<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Requests\PostAppointmentRequest;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointment = Appointment::get();
        return response()->json($appointment,200);
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json($appointment,204);
    }

    public function find($id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment,200);

    }
    
    public function update(UpdateAppointmentRequest $request, int $id)
    {
        $appointment = Appointment::find($id);
        $appointment->date = $request->date;
        $appointment->subject = $request->subject;
        $appointment->user_id = $request->user_id;
        $appointment->save();

        return response()->json($appointment,200);
    }

    

    public function store(PostAppointmentRequest $request)
    {
        $appointment = new Appointment;
        $appointment->date = $request->date;
        $appointment->subject = $request->subject;
        $appointment->user_id = $request->user_id;
        $appointment->save();

        return response()->json($appointment,201);
    }
}
