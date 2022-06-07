<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Treatment;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::all()->sortByDesc('id');
        return view('view-payment',compact('payments'));
    }

    public function create($id)
    {
        $treatment = Treatment::find($id);
        return view('add-payment',['treatment' => $treatment]);
    }

    public function store(Request $request)
    {
        try {
            $treatment = Treatment::find($request->treatment_id);
            if($treatment->description == ""){
                $newDesc =  $request->description;
            }else{
                $newDesc =  $treatment->description.','.$request->description;
            }
            $treatment->description = $newDesc;
            $treatment->save();
            $treatment->payments()->create([
                'treatment_id' => $request->treatment_id,
                'date' => now(),
                'paid' => $request->amount_paid,
                'balance' => $request->balance,
            ]);
            return redirect()->back();

        } catch (\Exception $e){
            return abort(403,'Something Went Wrong');
//        return redirect()->route('treatment.show',[$treatment->user_id]);
        }
    }

    public function show(User $user)
    {
        return view('view-payment',['payments' => $user->payments()->get()]);
    }

    public function specificTreatment(Treatment $treatment){

        $payments = $treatment->payments;
        $a = array();
        foreach ($treatment->payments as $pay){
            array_push($a,$pay->paid);
        }
        $sum = collect($a)->sum();
        $sub =  $treatment->type->amount - $sum;
        return view('view-treatment-payments',compact(['payments','sum','sub']));
    }

    public function edit(Payment $payment)
    {
        $payment = Payment::find($payment->id);
        return view('edit-payment',['payment' => $payment,'treatment' => Treatment::all()]);
    }

    public function update(Request $request, Payment $payment)
    {
        $payment = Payment::find($request->id);
        $payment->date = now();
        $payment->paid = $request->paid;
        $payment->balance = $request->balance;
        $payment->save();
        return redirect()->route('payment.show',[$payment->treatment->user->id]);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->back();
    }

}
