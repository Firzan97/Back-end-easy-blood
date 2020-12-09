<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datenow = date("Y-m-d h:i:s.u");
        return Event::where('dateStart', '>=', $datenow)->get();
    }
    public function userEvent($id)
    {
        //
        return Event::where('user_id', $id)
            ->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //assign image 
        $image = $request->image;
        //base64 string
        $file_path = 'event/' . rand() . time() . '.jpg';
        Storage::disk('s3')->put($file_path, base64_decode($image), 'public');

        if ($image == null) {
            $imageURL = "https://easy-blood.s3-ap-southeast-1.amazonaws.com/loadProfileImage.png";
        } else {
            $imageURL = Storage::disk('s3')->url($file_path);
        }
        $request->merge([
            'imageURL' => $imageURL,
        ]);
        $event = Event::create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //sasas
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
    public function update(Request $request, $Userid, $Eventid)
    {
        //
        $event = Event::find($Eventid);
        if ($request->imageURL != "") {
            $image = $request->imageURL; //base64 string
            $file_path = 'event/{$Eventid}/' . rand() . time() . '.jpg';
            Storage::disk('s3')->put($file_path, base64_decode($image), 'public');

            $event->imageURL = Storage::disk('s3')->url($file_path);
        }

        $event->name = $request->name;
        $event->location = $request->location;
        $event->organizer = $request->organizer;
        $event->phoneNum = $request->phoneNumber;
        $event->dateStart = $request->dateStart;
        $event->dateEnd = $request->dateEnd;
        $event->timeStart = $request->timeStart;
        $event->timeEnd = $request->timeEnd;
        $event->save();
        return $event;
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
        Event::destroy($id);
    }

    public function incomingEvent()
    {
        return Event::whereDate('dateStart', '>', Carbon::today()->toDateString());
    }
    public function todayEvent()
    {
        return Event::whereDate('dateStart', '=', Carbon::today()->toDateString());
    }
}
