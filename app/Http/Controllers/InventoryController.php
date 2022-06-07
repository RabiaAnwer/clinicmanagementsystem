<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function index()
    {
        $inventory = Inventory::all();
        return view('view-inventory', compact('inventory'));
    }

    public function create()
    {
        return view('add-inventory');
    }

    public function store(Request $request)
    {
//        echo json_encode($request->input());

        $inventory = Inventory::create([
            'item_name' => $request->item_name,
            'buying_date' => $request->buying_date,
            'expiry_date' => $request->expiry_date,
            'quantity' => $request->quantity
        ]);

        $inventory->expense()->create([
            'date' => now(),
            'amount' => $request->amount
        ]);
        return redirect()->route('inventory.index');
    }

    public function show(Inventory $inventory)
    {
        //
    }

    public function edit(Inventory $inventory)
    {
        $inventory = Inventory::find($inventory->id);
//        echo $inventory;
        return view('edit-inventory', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
//        echo json_encode($request->input());

        $inventory = Inventory::find($request->id);
        $inventory->item_name = $request->item_name;
        $inventory->buying_date = $request->buying_date;
        $inventory->expiry_date = $request->expiry_date;
        $inventory->quantity = $request->quantity;
        $inventory->expense->amount = $request->amount;
        $inventory->save();
        $inventory->expense->save();
        return redirect()->route('inventory.index');
    }

    public function destroy(Inventory $inventory)
    {
//        echo json_encode($inventory);
        $inventory->expense->delete();
        $inventory->delete();
//        }
        return redirect()->back()/*route('payment.show',[$payment->treatment->user_id])*/;
    }
//    }
}
