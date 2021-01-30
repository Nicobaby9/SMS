<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Comment, Tag, User, Thread, Feed};
use File;

class UserProfileController extends Controller
{
    public function index(User $user) {   
        $feeds = $user->feeds;
        $feedas = Feed::where('user_id', $user->id)->paginate(10);
        $profile = User::where('id', auth()->user()->id)->first();

        return view('profile.index', compact('feeds', 'user', 'profile', 'feedas'));
    }

    public function photo() {
        return view('auth.index');
    }

    public function photoStore(Request $request, $id) {
		$this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       	]);

       	$profile = User::find($id); 

       	if ($files = $request->file('photo')) {
        	$destinationPath = public_path('/profile_images/');
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath, $profileImage);
			$insert['image'] = "$profileImage";

			$imagemodel = User::find($id);
			$imagemodel->photo="$profileImage";
			$imagemodel->save();

            if($profile->photo != 'profile.png') {
                $a = File::delete($destinationPath . $profile->photo); 
            }
        }

        return redirect(route('user_profile', auth()->user()))->withMessage('Berhasil mengupdate data profile');
    }

    public function show(Request $request, $user) {
    	$profile = User::where('username', $user)->first();

    	return view('profile.edit', compact('profile', 'user'));
    }

    public function update(Request $request, $id) {
    	$this->validate($request, [
            'email' => 'max:70',
            'fullname' => 'max:140',
            'phone' => 'required|min:10|max:14',
            'username' => 'required',
        ]);

        $profile = User::findOrFail($id);
    	$profile->update([
        	'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
        ]);

    	return redirect(route('user_profile', auth()->user()))->withMessage('Berhasil mengupdate data profile');
    }
}
