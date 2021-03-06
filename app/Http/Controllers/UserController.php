<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use JWTAuth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  $users = User::where("role", "=", "user")->get();
        // return $users->load('events');

    }
    public function getAdmin()
    {
        //
        return  $users = User::where("role", "=", "admin")->get();
        // return $users->load('events');

    }
    public function getAdminData($id)
    {
        //
        return  $users = User::find($id);
        // return $users->load('events');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $plainPassword = $request->password;

        // create the user account 
        $created = User::create($request->all());
        $request->request->add(['password' => $plainPassword]);
        // login now..
        return $this->login($request);
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
        // get the user 
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' => $user
        ]);
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
        $user = User::find($id);
        return $user;
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
    public function updateAdmin(Request $request, $id)
    {
        //
        $user = User::find($id);
        if ($request->image != "") {
            $image = $request->image; //base64 string
            $file_path = 'profile/{$id}/' . rand() . time() . '.jpg';
            Storage::disk('s3')->put($file_path, base64_decode($image), 'public');

            $user->imageURL = Storage::disk('s3')->url($file_path);
        } else {
            $user->imageURL = "https://easy-blood.s3-ap-southeast-1.amazonaws.com/loadProfileImage.png";
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->age = $request->age;

        $user->save();
        // return Storage::disk('s3')->url($file_path);
    }
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        if ($request->image != "default image") {
            $image = $request->image; //base64 string
            $file_path = 'profile/{$id}/' . rand() . time() . '.jpg';
            Storage::disk('s3')->put($file_path, base64_decode($image), 'public');

            $user->imageURL = Storage::disk('s3')->url($file_path);
        }

        if ($request->type == "updateLocation") {
            $user->latitude = $request->latitude;
            $user->longitude = $request->longitude;
            print("cinbei");
        } else {
            $user->username = $request->username;
            $user->latitude = $request->latitude;
            $user->longitude = $request->longitude;
            $user->height = $request->height;
            $user->weight = $request->weight;
            $user->phoneNumber = $request->phoneNumber;
            $user->bloodType = $request->bloodType;
            $user->gender = $request->gender;
            $user->isOnline = false;
        }

        $user->save();
        // return Storage::disk('s3')->url($file_path);
    }
    public function updateRole(Request $request, $id)
    {

        $user = User::find($id);
        $user->role = $request->role;

        $user->save();
    }
    public function updatePresence(Request $request, $id)
    {
        $user = User::find($id);
        $user->isOnline = $request->isOnline;
        $user->save();
    }
    public function updateName(Request $request, $id)
    {
        event(new \App\Events\SendMessage("naburo" ?: 'No Message :)'));

        $user = User::find($id);
        $user->isOnline = true;

        $user->save();
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
        User::destroy($id);
    }
}
