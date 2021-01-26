<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Gallery;
use File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $imageSize = $file->getsize();
            $destinationPath = public_path('/gallery/');
            $file->move($destinationPath, $filename);
            $insert['image'] = "$filename";

            $gallery = Gallery::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'photo' => $filename,
                'size' => $imageSize,
            ]);

            return redirect(route('gallery.index'))->withMessage('Gallery was successfully created.');
        }
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
        $gallery = Gallery::where('id', $id)->first();

        return view('admin.gallery.edit', compact('gallery'));
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
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);

        // dd($gallery);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $imageSize = $file->getsize();
            $destinationPath = public_path('/gallery/');
            $file->move($destinationPath, $filename);
            $a = File::delete($destinationPath . $gallery->photo); 

            $gallery->update([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'photo' => $filename,
                'size' => $imageSize,
            ]);


            return redirect(route('gallery.index'))->withMessage('Gallery was successfully updated.');
        }else {
            $gallery->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        $destinationPath = public_path('/gallery/');
        $a = File::delete($destinationPath . $gallery->photo); 

        $gallery->delete();

        return redirect(route('gallery.index'))->withMessage('Gallery was successfully deleted.');
    }
}
