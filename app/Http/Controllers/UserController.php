<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
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
        echo 'alal';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStaff(UserRequest $request)
    {
        $request->validated();

        $user = new User;
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role_id = config('auth.roles.sale-manager');
        $user->avatar = 'sale_manager.png';

        $user->save();
        return redirect()->back()->with('status', __('messages.create-staff-account-successfully', 
            ['account' => $user->username]));
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
        $accounts = User::where('role_id','<>',config('auth.roles.admin'))->get();
        return view('admin.users.account', ['accounts' => $accounts]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function lockAccount(User $user)
    {
        $user->role_id = config('auth.roles.locked');
        $user->save();
        return redirect()->back()->with('status', __('messages.locked-account-successfully', ['account' => $user->username]));
    }

    public function unlockAccountCustomer(User $user){
        $user->role_id = config('auth.roles.customer');
        $user->save();
        return redirect()->back()->with('status', __('messages.unlocked-account-successfully', 
            ['account' => $user->username, 'role' => $user->role->title]));
    }

    public function unlockAccountManager(User $user){
        $user->role_id = config('auth.roles.sale-manager');
        $user->save();
        return redirect()->back()->with('status', __('messages.unlocked-account-successfully', 
            ['account' => $user->username, 'role' => $user->role->title]));
    }
    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function getProfile(){
        $user = Auth::user();
        return view('users.profile', ['user'=>$user]);
    }

    /**
     * 
     * @param  UpdateProfileRequest $request 
     * @return \Illuminate\Http\Response
     */
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

    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm(){
        return view('users.change-password');
    }

    /**
     * 
     * @param  ChangePasswordRequest $request 
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangePasswordRequest $request){
        $valid = $request->validated();

        $user = Auth::user();

        if(Hash::check($request->password, $user->password)){
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return redirect()->back()->with('status', __('messages.update-password-successfully'));
        }
        return redirect()->back()->withErrors(['incorrect-password' => __('messages.incorrect-password')]);
    }
}
