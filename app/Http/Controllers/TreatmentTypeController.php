<?php

namespace App\Http\Controllers;

use App\Models\TreatmentType;
use Illuminate\Http\Request;

class TreatmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $treatmentType = TreatmentType::find($request->id);
        echo $treatmentType->amount;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TreatmentType  $treatmentType
     * @return \Illuminate\Http\Response
     */
    public function show(TreatmentType $treatmentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TreatmentType  $treatmentType
     * @return \Illuminate\Http\Response
     */
    public function edit(TreatmentType $treatmentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TreatmentType  $treatmentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TreatmentType $treatmentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreatmentType  $treatmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TreatmentType $treatmentType)
    {
        //
    }
}
