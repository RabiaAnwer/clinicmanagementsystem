<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\TreatmentType;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{

    public function index(User $user)
    {
        $treatments = Treatment::all();
        return view('view-treatment',compact('treatments'));
    }

    public function create(User $user)
    {
//        echo  json_encode($user->treatments[0]->type->typeof);
        $treatment = TreatmentType::all();
        return view('add-treatment',compact(['user','treatment']));
    }

    public function store(Request $request)
    {
//        echo json_encode($request->input());
        $user = User::find($request->user_id);
        $treatment = $user->treatments()->create([
            'user_id' => $request->user_id,
            'typeof_id' => $request->typeof_id,
            'treatment_date' => now(),
            'description' => $request->description
        ]);
        $treatment->payment()->create([
            'date' => now(),
            'paid' => $request->paid,
            'balance' => $request->balance
        ]);
//
        return redirect()->route('treatment.show',[$user->id]);
    }

    public function show(User $user)
    {
        return view('view-treatment',['treatments' => $user->treatments()->get(),'payment' => $user->payments()->get()]);
    }

    public function edit(Treatment $treatment)
    {
        //
    }

    public function update(Request $request, Treatment $treatment)
    {
        //
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->payments()->delete();
        $treatment->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }
}
