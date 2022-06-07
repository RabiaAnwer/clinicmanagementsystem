<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Payment;
use App\Models\Treatment;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard(){

        $authUser = auth()->user();
        $id = auth()->user()->id;
        $user = auth()->user();
        $role = auth()->user()->role->role;
        $p = array();
        $e = array();
        $tc = array();

        if($role === 'Patient')
        {
            $total_treatments =  count($user->treatments);

            foreach ($user->payments as $pay){
                array_push($p,$pay->paid);
            }
            foreach ($user->treatments as $total_cost){
                array_push($tc,$total_cost->type->amount);
            }

            $total_cost = collect($tc)->sum();
            $paid = collect($p)->sum();

            $balance = $total_cost - $paid;

            return view('dashboard',compact(['id','role','paid','total_treatments','balance']));
        }

        elseif($role === 'Assistant')
        {
            $patients = count(User::all()->where('role_id',3));
            $users = User::all()->where('role_id',3);
            $total_treatments = count(Treatment::all());
            foreach (Payment::all() as $pay){
                array_push($p,$pay->paid);
            }
            foreach ($users as $user) {
                foreach ($user->treatments as $treatment) {
                    array_push($tc, $treatment->type->amount);
                }
            }

            $paid = collect($p)->sum();
            $total_cost = collect($tc)->sum();

            $balance = $total_cost - $paid;

            return view('dashboard',compact(['id','role','patients','paid','balance','total_treatments']));
        }
        else{

            $patients = count(User::all()->where('role_id',3));
            $total_treatments = count(Treatment::all());

            $users = User::all()->where('role_id',3);

            foreach (Payment::all() as $pay){
                array_push($p,$pay->paid);
            }
            foreach (Expense::all() as $exp){
                array_push($e,$exp->amount);
            }
            foreach ($users as $user) {
                foreach ($user->treatments as $treatment) {
                    array_push($tc, $treatment->type->amount);
                }
            }
            $total_cost = collect($tc)->sum();
            $paid = collect($p)->sum();
            $exp = collect($e)->sum();
            $balance = $total_cost - $paid;

            return view('dashboard',compact(['id','role','exp','patients','paid','total_treatments','balance']));
        }
    }

    public function index(){
        return view('profile');
    }

    public function viewAssistant(){
        $user = User::where(['role_id' => 2])->get();
        return view('view-assistant', compact('user'));
    }
    public function viewPatient(){
        $user = User::where(['role_id' => 3])->get();
        return view('view-patient', compact('user'));
    }

    public function createPatient()
    {
        return view('add-patient');
    }
    public function createAssistant()
    {
        return view('add-assistant');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'care_of' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'role_id' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('123456789'),
            'role_id' => $request->role_id
        ]);
        $user->UserDetail()->create([
            'care_of' => $request->care_of,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'phone_number' => $request->phone_number,
        ]);
//            if($request->role_id == 1){
//                return redirect()->route('doctor.view');
//            }
        if($request->role_id == 2){
            return redirect()->route('assistant.view');
        }
        if($request->role_id == 3){
            return redirect()->route('patient.view');
        }
    }

    public function edit(User $user)
    {
        return view('edit-user',compact('user'));
    }
    public function update(Request $request, User $user)
    {

        $user = User::find($request->id);
        $userDetail = UserDetail::find($request->id);

        if($user != null && $userDetail == null){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->userDetail()->create([
                'care_of' =>  $request->care_of,
                'age' => $request->age,
                'gender' => $request->gender,
                'address' => $request->address,
                'mobile_number' => $request->mobile_number,
                'phone_number' => $request->phone_number,
            ]);
        }
        else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->userDetail->care_of = $request->care_of;
            $user->userDetail->age = $request->age;
            $user->userDetail->gender = $request->gender;
            $user->userDetail->address = $request->address;
            $user->userDetail->mobile_number = $request->mobile_number;
            $user->userDetail->phone_number = $request->phone_number;
            $user->save();
            $user->userDetail->save();
        }

        if($user->role_id == 1){
            return redirect()->route('dashboard');
        }
        if($user->role_id == 2){
            return redirect()->route('assistant.view');
        }
        if($user->role_id == 3){
            return redirect()->route('patient.view');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->userDetail()->delete();
        $user->expenses()->delete();
        $user->appointment()->delete();
        $user->payments()->delete();
        $user->treatments()->delete();
        $user->delete();
        return redirect()->back();
    }
}
