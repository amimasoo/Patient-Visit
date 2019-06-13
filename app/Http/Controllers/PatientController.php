<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patientVisitForm.add');
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
        $patient = Patient::create([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'nationalNumber' => $request['nationalNumber'],
            'phoneNumber' => $request['phoneNumber'],
            'height' => $request['height'],
            'weight' => $request['weight'],
            'BMI' => $request['BMI']
        ]);

         Visit::create([
            'date'=>$request['date'],
            'patientID'=> $patient->id
        ]);

        Session::flash('message', '.تاریخ ویزیت '.$patient->firstName.' '.$patient->lastName.' با موفقیت ثبت شد');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {

    }

    public function visitListView(){
//        return $height = Patient::select('height')->get();
//
//        return $patient['height'];
//        $weight = $patient['weight'];
//
//        $weight2 = $weight * $weight;
//        return $weight;


        $visits = Visit::with('patients')->paginate(10);
//        return $visits;
        return view('reportsTable.reportsTable',compact('visits'));


    }
}
