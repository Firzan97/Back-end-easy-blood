<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Req;
use App\User as User;
use App\Http\Controllers\FactController;
use App\Http\Controllers\UserController;
use App\Traits\InferenceEngineTrait;
use PDO;

class RequestController extends Controller
{
    use InferenceEngineTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $UserController;
    public function __construct(UserController $UserController)
    {
        $this->UserController = $UserController;
    }
    public function findDonor($bloodType)
    {
        return $this->inferenceEngine($bloodType);
    }
    public function index()
    {
        //
        return Req::where("donor_id", null)->with('user')->get();
    }
    public function AcceptedRequest($id)
    {
        return Req::where("donor_id", $id)->with('user')->get();
    }

    public function userRequest($id)
    {
        //
        return Req::where('donor_id', $id)
            ->count();
    }
    public function saveDonor(Request $request)
    {
        $req = Req::find($request->requestId);
        $req->donor_id = $request->donorId;
        $req->save();
        // return Req::where("donor_id", "=", $request->donorId)->count();
        return $req;
    }
    public function lifeSaved($id)
    {
        $req = Req::with("user")->where("donor_id", "=", $id)->get();
        return $req;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //


        $created = Req::create($request->all());
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
        Req::destroy($id);
    }
    public function addFact(Request $request)
    {
        //
        // $blood = $request->bloodType;
        // $userInfo = $this->UserController->show($user_id);
        // $age = $userInfo->age;
        // $gender = $userInfo->gender;
        // $pregnant = $userInfo->pregnant;
        // $last_pregnant = $userInfo->last_pregnant;
        // $last_donate = $userInfo->last_donate;
        // $have_deasese = $userInfo->have_deasese;
        // $weight = $userInfo->weight;
        // $facts = array($blood, $age, $gender, $pregnant, $last_pregnant, $last_donate, $have_disease, $weight);
        $this->FactController->setFacts($request);
    }
}
