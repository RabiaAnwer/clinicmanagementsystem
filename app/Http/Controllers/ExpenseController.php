<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;
use voku\helper\ASCII;

class ExpenseController extends Controller
{

    public function index()
    {
        $expenses = Expense::all();
//        return $expense;
        return view('view-expense',compact('expenses'));
    }

    public function create()
    {
        if(auth()->user()->role->id == 1){
            $users = User::all();
            return view('add-expense',compact('users'));
        }
        return view('add-expense');
    }

    public function store(Request $request)
    {
//        echo json_encode($request->input());
        $expense = Expense::create([
            'date' => now(),
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'description' => $request->description
        ]);
//        echo json_encode($expense);
        return redirect()->route('expense.index');
    }

    public function show(Expense $expense)
    {
        //
    }

    public function edit(Expense $expense)
    {
        $expense = Expense::find($expense->id);
//        echo $expense;
        return view('edit-expense',compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $expense = Expense::find($request->id);
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->date = now();
        $expense->save();
        return redirect()->route('expense.index');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        $expense->inventory()->delete();
        return redirect()->route('expense.index');
    }
}
