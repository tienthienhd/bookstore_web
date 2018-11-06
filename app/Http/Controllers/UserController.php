<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use DateTime;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListStaff()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStaff(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePermission(Request $request, User $user)
    {
        //
    }

    public function getListAccount(){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function deleteAccount(User $user)
    {
        //
    }

    public function getProfile(){
        $user = Auth::user();
        return view('users.profile', ['user'=>$user]);
    }

    public function updateProfile(UpdateProfileRequest $request){
        //  Validate the data
        $valid = $request->validated();

        $user = Auth::user();
        //  Prepare image file
        if($request->hasFile('avatar')){
            /*
            *   If wanna delete old avatar
            */
            // $currentPath = getcwd();
            // $url = $currentPath."\\img\\avatars\\".$user->avatar;
            // @unlink($url); //put @ for surpress any error
        
            //  Prepare avatar image to save
            $avatarFile = $request->avatar;
            $avatar = ((new DateTime)->getTimestamp())
                .'_'.rand().'.'.$avatarFile->getClientOriginalExtension();
            $destinationPath = public_path('/img/avatars');

            //  Save avatar image
            $avatarFile->move($destinationPath, $avatar);
            $user->avatar = $avatar;
        }      

        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;

        $user->save();

        return redirect()->back()->with('status', __('messages.update-profile-successfully'));
    }

    public function showChangePasswordForm(){

    }

    public function changePassword(){
        
    }
}
