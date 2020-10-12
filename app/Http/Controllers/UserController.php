<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth:api')->except(['list', 'show']);
    // }

    public function list(){
        return json_encode([
            'data' => User::all()->toArray()
        ]);
    }

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'unique:users|required',
            'email'    => 'unique:users|required',
            'password' => 'required',
            'location' => 'required',
            'birthday' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode([
                'data' => [
                    'error' => $validator->messages()->first()
                ]
            ]);
        }
        
        $name = $request->name;
        $email    = $request->email;
        $password = $request->password;
        $birthday = Carbon::create($request->birthday)->toDateTimeString();
        $location = $request->location;
        $avatar = $request->name[0];
        $user     = User::create([
            'name' => $name, 
            'email' => $email, 
            'password' => Hash::make($password), 
            'birthday' => $birthday, 
            'location' => $location, 
            'avatar' => $avatar
            ]);
        return json_encode([
            'data' => [
                'success' => true
            ]
        ]);

    }

    public function show($name){
        $user = User::where('name', $name)->get();
        return json_encode([
            'data' => $user->toArray()
        ]);
    }

    public function update(Request $request, $name){

        $validator = Validator::make($request->all(), [
            'name' => 'unique:users|required',
            'email'    => 'unique:users|required',
            'password' => 'required',
            'location' => 'required',
            'birthday' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode([
                'data' => [
                    'error' => $validator->messages()->first()
                ]
            ]);
        }

        $user = User::where('name', $name)->get();
        $user->fill($request->all());

        return json_encode([
            'data' => $user->toArray()
        ]);
    }



};
