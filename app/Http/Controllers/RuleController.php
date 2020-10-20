<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function knowledgeBase($request, &$knownfact, &$generatedFact)
    {
        $kf1 = $request->age;
        $kf2 = $request->gender;
        $kf3 = $request->latest_donation;
        $kf4 = $request->bloodType;
        $kf5 = $request->chronicDesease;
        $kf6 = $request->weight;
        //Rule1
        if ($kf1 > 18) {
            $gf1 = "suitable age";
        } else {
            $gf1 = "underage";
        }
        //Rule2
        if ($kf2 == "Female") {
            if ($request->latest_pregnant > 42) {
                $gf2 = "you can donate";
            } else {
                $gf2 = "need to wait 42 days after pregnant";
            }
        } else {
            $gf2 = "you can donate";
        }
        //Rule3
        if ($kf3 > 90) {
            $gf3 = "blood already replenish";
        } else {
            $gf3 = "blood not fully replenish";
        }
        //Rule4
        if ($kf4 == "AB") {
            $gf4 = "blood is identical with requestor";
        } else {
            $gf4 = "blood not identical";
        }
        //Rule5
        if ($kf5 == "Yes") {
            $gf5 = "no risk";
        } else {
            $gf5 = "there are risk";
        }
        //Rule6
        if ($kf6 > 50 && $kf6 < 150) {
            $gf6 = "weight is good";
        } else {
            $gf6 = "underweight";
        }
        //Rule7
        if ($gf1 == "suitable age" && $gf2 == "you can donate" && $gf3 == "blood already replenish" && $gf4 == "blood is identical with requestor" && $gf5 == "no risk" && $gf6 == "weight is good") {
            $gf7 = "you are eligible";
        } else {
            $gf7 = "you are not eligible";
        }
        $knownfact = array($kf1 => false, $kf2 => false, $kf3 => false, $kf4 => false, $kf5 => false, $kf6 => false);
        $generatedFact = array($gf1 => false, $gf2 => false, $gf3 => false, $gf4 => false, $gf5 => false, $gf6 => false, $gf7 => false);
    }

    public function workingMemory(&$knownfact, &$generatedFact)
    {
        foreach ($knownfact as $key => $value) {
            if ($key > 18) {
                $gf1 = "suitable age";
                $update = array($gf1 => true);
                array_replace($knownfact, $update);
            } else {
                $gf1 = "underage";
            }
            //Rule2
            if ($key == "Female") {
                if ($request->latest_pregnant > 42) {
                    $gf2 = "you can donate";
                    $update = array($gf2 => true);
                    array_replace($knownfact, $update);
                } else {
                    $gf2 = "need to wait 42 days after pregnant";
                }
            } else {
                $gf2 = "you can donate";
            }
            //Rule3
            if ($key > 90) {
                $gf3 = "blood already replenish";
                $update = array($gf3 => true);
                array_replace($knownfact, $update);
            } else {
                $gf3 = "blood not fully replenish";
            }
            //Rule4
            if ($key == $bloodRequested) {
                $gf4 = "blood is identical with requestor";
                $update = array($gf4 => true);
                array_replace($knownfact, $update);
            } else {
                $gf4 = "blood not identical";
            }
            //Rule5
            if ($key == "Yes") {
                $gf5 = "no risk";
                $update = array($gf5 => true);
                array_replace($knownfact, $update);
            } else {
                $gf5 = "there are risk";
            }
            //Rule6
            if ($key > 50 && $kf6 < 150) {
                $gf6 = "weight is good";
                $update = array($gf6 => true);
                array_replace($knownfact, $update);
            } else {
                $gf6 = "underweight";
            }



            //Rule7
        }
        foreach ($generatedFact as $key => $value) {
            if ($key == "suitable age") {
                $update = array($key => true);
                array_replace($generatedFact, $update);
            }

            if ($key == "you can donate" && $generatedFact["suitable age"] == true) {
                $update = array($key => true);
                array_replace($generatedFact, $update);
            }

            if ($key == "blood already replenish" && $generatedFact["you can donate"] == true) {
                $update = array($key => true);
                array_replace($generatedFact, $update);
            }

            if ($key == "blood is identical with requestor" && $generatedFact["blood already replenish"] == true) {
                $update = array($key => true);
                array_replace($generatedFact, $update);
            }

            if ($key == "no risk" && $generatedFact["suitable ageblood is identical with requestor"] == true) {
                $update = array($key => true);
                array_replace($generatedFact, $update);
            }

            if ($key == "weight is good" && $generatedFact["no risk"] == true) {
                $update = array($key => true);
                array_replace($generatedFact, $update);
            }
        }
    }


    public function inferenceEngine($request)
    {

        $this->knowledgeBase($request, $knownfact, $generatedFact);
        $this->workingMemory($knownfact, $generatedFact);

        $count = 0;
        foreach ($generatedFact as $key) {
            if ($generatedFact[$key] == false) {
                $count++;
            }
        }
        foreach ($knownfact as $key) {
            if ($generatedFact[$key] == false) {
                $count++;
            }
        }

        if (count == 0) {
            return "you are eligble";
        } else {
            return "you are not eligible";
        }
    }
}
