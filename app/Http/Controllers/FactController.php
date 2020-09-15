<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setFacts(Request $request)
    {


        $blood = $request->bloodType;
        $userInfo = $this->UserController->show($request->user_id);
        $age = $userInfo->age;
        $gender = $userInfo->gender;
        $pregnant = $userInfo->pregnant;
        $last_pregnant = $userInfo->last_pregnant;
        $last_donate = $userInfo->last_donate;
        $have_deasese = $userInfo->have_deasese;
        $weight = $userInfo->weight;
        $facts = array($blood, $age, $gender, $pregnant, $last_pregnant, $last_donate, $have_disease, $weight);
    }
}
