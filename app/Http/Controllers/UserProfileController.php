<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use App\{User, Thread, Feed};
use File;

class UserProfileController extends Controller
{
    public function index(User $user) {   
        $threads = Thread::where('user_id', $user->id)->latest()->get();
        $comments = Comment::where('user_id', $user->id)->where('commentable_type', 'App\Thread')->get();
        $feeds = $user->feeds;
        $profile = User::where('id', auth()->user()->id)->first();
        // dd($profile->id);

        return view('profile.index', compact('feeds', 'threads', 'comments', 'user', 'profile'));
    }

    public function photo() {

        return view('auth.index');
    }

    public function photoShow($id) {
    	$id = User::where('id', $id)->first();

    	// dd($id->id);

    	return view('auth.photo', compact('id'));
    }

    public function photoStore(Request $request, $id) {
		$this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       	]);

       	$profile = User::find($id);
       	// dd($profile->photo);

       	if ($files = $request->file('photo')) {
       		// Define upload path
        	$destinationPath = public_path('/profile_images/');

			// Upload Orginal Image           
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath, $profileImage);
			$insert['image'] = "$profileImage";

        	// Save In Database
			$imagemodel = User::find($id);
			$imagemodel->photo="$profileImage";
			$imagemodel->save();

            $a = File::delete($destinationPath . $profile->photo); 
            // dd($a);
        }

        return redirect(route('user_profile', auth()->user()))->withMessage('Berhasil mengupdate data profile');
    }

    public function show(Request $request, $user) {
    	$profile = User::where('username', $user)->first();

    	// dd($username);

    	return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id) {
    	$this->validate($request, [
            'email' => 'max:70',
            'fullname' => 'max:140',
            'phone' => 'required|min:10|max:14',
            'username' => 'required',
        ]);


        $profile = User::findOrFail($id);
        // $filename = $profile->photo;
        // dd($filename);

        // if ($request->hasFile('photo')) {
        	// $photo = $request->file('photo');
        	// $photo = $request->photo;
        	// $filename = time(). $photo->getClientOriginalExtension();
        	// dd($filename);
        	// $photo->move('public/profil_images/', $filename);
            // $file->storeAs('public/', $filename);
        	
        	// $post_data = [
	        // 	'fullname' => $request->fullname,
	        //     'email' => $request->email,
	        //     'phone' => $request->phone,
	        //     'username' => $request->username,
	        //     'photo' => 'public/profil_images/'.$new_photo,
	        // ];
	        // $profile->update($post_data);
        
            // File::delete(public_path('/profile_images/' . $profile->photo)); 
        // }
    	$profile->update([
        	'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
        ]);
	        

    	return redirect(route('user_profile', auth()->user()))->withMessage('Berhasil mengupdate data profile');
    }
}
