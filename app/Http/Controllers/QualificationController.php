<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualification;
use Carbon\Carbon;
use DateTime;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        //
        $test = Qualification::where("user_id", $id)->get();
        if (count($test) < 1) {
            $qualification = new Qualification;
        } else {
            $qualification = Qualification::where("user_id", $id)->first();
        }
        $qualification->lastDonation = $request->lastDonation;
        $qualification->desease = $request->desease;
        $qualification->problem = $request->problem;
        $qualification->beautyInjection = $request->beautyInjection;
        // $qualification->lastInjection = $request->lastInjection;
        $qualification->familyHavingHepatitis = $request->familyHavingHepatitis;
        $qualification->dengue = $request->dengue;
        // $qualification->lastInfectedDengue = $request->lastInfectedDengue;
        $qualification->receiveVaccine = $request->receiveVaccine;
        // $qualification->dateReceiveVaccine = $request->dateReceiveVaccine;
        $qualification->misscariage = $request->misscariage;
        // $qualification->dateMisscariage = $request->dateMisscariage;
        $qualification->pierceCuppingAcupuntureTattoo = $request->pierceCuppingAcupuntureTattoo;
        // $qualification->datepierceCuppingAcupuntureTattoo = $request->datepierceCuppingAcupuntureTattoo;
        $qualification->takeAntiobiotic = $request->takeAntiobiotic;
        // $qualification->dateTakeAntibiotic = $request->dateTakeAntibiotic;
        $qualification->surgical = $request->surgical;
        $qualification->injury = $request->injury;
        $qualification->transfussion = $request->transfussion;
        $qualification->CJD1 = $request->CJD1;
        $qualification->CJD2 = $request->CJD2;
        $qualification->CJD3 = $request->CJD3;
        $qualification->sexWithMan = $request->sexWithMan;
        $qualification->sexWithProstitute = $request->sexWithProstitute;
        $qualification->paidOrPaySex = $request->paidOrPaySex;
        $qualification->sexPartnerNumber = $request->sexPartnerNumber;
        $qualification->sexPArnerLast12Month = $request->sexPArnerLast12Month;
        $qualification->injectDrug = $request->injectDrug;
        $qualification->partnerCatagories = $request->partnerCatagories;
        $qualification->partnerHIVpositive = $request->partnerHIVpositive;
        $qualification->youOrSexPartnerHIVinfected = $request->youOrSexPartnerHIVinfected;

        $qualification->feelingWell = false;
        $qualification->testBlood = false;
        $qualification->dentalTreatment = false;
        $qualification->takenAlcohol = false;
        $qualification->menstruating = false;
        $qualification->pregnant = false;
        $qualification->breastfeed = false;
        $qualification->user_id = $id;
        $qualification->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Qualification::where("user_id", $id)->first();
    }
    public function latestDonation($id)
    {

        //
        $mytime = Carbon::now();
        $qualification =  Qualification::where("user_id", $id)->first();
        $lastDonate = $qualification->lastDonation;
        $lastDonate = datetime::createfromformat('Y-m-d H:i:s.u', $lastDonate);
        $datenow = new DateTime(date('Y-m-d H:i:s.u'));
        return $days  = $datenow->diff($lastDonate)->format('%a');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $qualification = Qualification::where("user_id", $id)->first();
        $qualification->feelingWell = $request->feelingWell;
        $qualification->testBlood = $request->testBlood;
        $qualification->dentalTreatment = $request->dentalTreatment;
        $qualification->takenAlcohol = $request->takenAlcohol;
        $qualification->menstruating = $request->menstruating;
        $qualification->pregnant = $request->pregnant;
        $qualification->breastfeed = $request->breastfeed;
        $qualification->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
