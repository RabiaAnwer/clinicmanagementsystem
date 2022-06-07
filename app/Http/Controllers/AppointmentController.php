<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointment = Appointment::all();
        return view('view-appointment', ['appointments' => $appointment]);
    }


    public function create()
    {
        $users = User::all()->where('role_id',3);
        return view('add-appointment',compact('users'));
    }

    public function store(Request $request)
    {

//        print_r($request->input());
        if (is_numeric($request->userselection)){

            $user = User::find($request->userselection);

            if ($user != null) {
                $user = User::findorfail($request->userselection);
                $user->appointment()->create([
                    'appointment_type' => $request->appointment_type,
                    'booking_date' => now(),
                    'appointment_date' => $request->appointment_date
                ]);
//                return redirect()->back()->with('message', 'Appointment is set successfully');
                return redirect()->route('appointment.index');
            }
            return redirect()->back()->with('message', 'User ID not exists');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('123456789'),
            'role_id' => 3
        ]);
        $user->userDetail()->create([
            'care_of' => $request->care_of,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number
        ]);
        $user->appointment()->create([
            'booking_date' => now(),
            'appointment_type' => $request->appointment_type,
            'appointment_date' => $request->appointment_date
        ]);
        return redirect()->route('appointment.index');

    }

    public function show(Appointment $appointment)
    {
        //
    }

    public function edit(Appointment $appointment)
    {
        $appointment = Appointment::find($appointment->id);
//        echo $appointment;
        return view('edit-appointment',compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
//        $user = User::find($request->user_id);
        $appointment = Appointment::find($request->id);
        $appointment->appointment_type = $request->appointment_type;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->save();
        return redirect()->route('appointment.index');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointment.index');
    }
}
