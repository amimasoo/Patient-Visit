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
        $patients = Patient::paginate(5);
//        $patients = Patient::all();
        return view('reportsTable.reportsTable', compact('patients'));

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
        $existing_patient = Patient::where('nationalNumber', $request['nationalNumber'])->first();

        if ($existing_patient == null) {
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
                'date' => $request['date'],
                'patientID' => $patient->id
            ]);
            Session::flash('message', '.تاریخ ویزیت '.$patient->firstName.' '.$patient->lastName.' با موفقیت ثبت شد');
            Session::flash('alert-class', 'alert-success');
        } else {

            Visit::create([
                'date' => $request['date'],
                'patientID' => $existing_patient->id
            ]);
            Session::flash('message', '.تاریخ ویزیت '.$existing_patient->firstName.' '.$existing_patient->lastName.' با موفقیت ثبت شد');
            Session::flash('alert-class', 'alert-success');
        }


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
        $patient = Patient::where('id', $patient->id)->with('visits')->first();
//        return $patient;
        return view('patientVisitForm.edit',compact('patient'));
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
//        $visit = Visit::all();
        
        $patient->update($request->all());

        Session::flash('message', '.اطلاعات ویزیت '.$patient->firstName.' '.$patient->lastName.' با موفقیت ویرایش شد');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        Session::flash('message', 'اطلاعات این ویزیت با موفقیت حذف شد');
        Session::flash('alert-class', 'alert-success');

        $patient->delete();

        Visit::where('patientID',$patient->id)->delete();
        return back();
    }

    public function visitListView(){

//        $visits = Visit::with('patients')->paginate(10);
//        return view('reportsTable.reportsTable',compact('visits'));
    }

    public function add()
    {
        return view('patientVisitForm.add');
    }

    public function searchPatient(){
        return view('checkPatient.searchNationalNumber');
    }

    public function isPatient(Request $request){

        $existing_patient = Patient::where('nationalNumber', $request['nationalNumber'])->first();
//        return $existing_patient->firstName;
        if($existing_patient == null){

            Session::flash('message', '.این کد ملی در سیستم وجود ندارد.اطلاعات کامل بیمار را وارد کنید');
            Session::flash('alert-class', 'alert-warning');
//            return "vojood nadarad";
//            return redirect('/visit/add');
            return view('patientVisitForm.add');
        }
        elseif($existing_patient != null) {
//            return "vojood darad";
//
            Session::flash('message', '.بیمار '.$existing_patient->firstName.' '.$existing_patient->lastName.' قبلا در سیستم ویزیت داشته است. لطفا فقط تاریخ ویزیت جدید را انتخاب کنید');
            Session::flash('alert-class', 'alert-success');
//            return redirect('/existpatient');
//            return $existing_patient;
            return view('patientVisitForm.existPatient',compact('existing_patient'));
        }
    }

    public function higheBMI()
    {
        $BMI = Patient::where()->get();
        return $BMI;
    }
}
