<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Profile;

class ProfileController extends Controller
{
    public function saveprofile(Request $req){
        $profile = new profile;
        $profile->first_name = $req->first_name;
        $profile->last_name = $req->last_name;
        $profile->email = $req->email;
        $profile->phone = $req->phone;
        $profile->save();

        return redirect("profile_list");
        

        //return view('postprofile');
    }

    public function getProfile(){
        $profile_all = Profile::all();
        //dd($profile_all);
        return view('profile_list',['profile'=>$profile_all]);
    }

    public function delProfile(Request $req){

        Profile::where('id',$req->id)
        ->delete();
        return "ok";
    }

    public function formEdit($id){
        $profile = Profile::where('id',$id)->first();

        return view('editProfile',['profile'=>$profile]);
    }
    
    public function updateProfile(Request $req){
        profile::where('id',$req->id)
        ->update(['first_name'=>$req->first_name,
                   'last_name'=>$req->last_name,
                   'email'=>$req->email,
                   'phone'=>$req->phone,]);
        return redirect('profile_list');
    }
}
