<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\{User, Thread};
use Auth;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $profile = Auth::user()->first();
        // $profile = User::findOrFail($id);

        return view('profile.edit', compact('profile'));
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
        $this->validate($request, [
            'email' => 'max:70',
            'fullname' => 'max:140',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
            'phone' => 'required|min:10|max:14',
        ]);

        dd('ase');

        if ($request['photo'] == null) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time().'.'.Str::slug($request->name).'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/profile-photo', $filename);

                $user = User::where('id', $id)->update([
                    'email' => $request['email'],
                    'fullname' => $request['fullname'],
                    'photo' => $filename,
                    'phone' => $request['phone'],
                ]);

                return redirect('/administrator/home')->with(['success' => 'Student data was successfully updated.']);
            }
        }

        $profile = User::findOrFail($id);
        $filename = $profile->photo;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'.'.Str::slug($request->fullname).'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/profile-photo', $filename);
            File::delete(public_path('profile-photo'. $profile->photo));
        }

        $user = User::where('id', $id)->update([
            'email' => $request['email'],
            'fullname' => $request['fullname'],
            'photo' => $filename,
            'phone' => $request['phone'],
        ]);

        dd($user);

        return redirect('/administrator/home')->with(['success' => 'Student data was successfully updated.']);
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
    }
}
