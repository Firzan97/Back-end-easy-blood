<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualification;


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
        $qualification = new Qualification;
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
        $qualification->user_id = $request->user_id;
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
