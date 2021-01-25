<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Frontend;

class FrontendImageController extends Controller
{
    public function settingImages() {
        return view('admin.frontend.images');
    }

    public function updateImage(Request $request, $id) {
    	$this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $about = Frontend::all()->first();
        // $gallery = Frontend::findOrFail($id);


        $imageArray = ['logo', 'content1_photo', 'content2_photo', 'content3_photo', 'profile1_photo', 'profile2_photo', 'profile3_photo'];

        // dd($request->file());
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $imageSize = $file->getsize();
            $destinationPath = public_path('/storage/frontend/');
            $file->move($destinationPath, $filename);
            // $a = File::delete($destinationPath . $about->photo); 

            $about->update([
                'logo' => $filename,
            ]);
            
            return redirect(route('frontend.image'))->with(['success' => 'Data was successfully created.']);

        }else if ($request->hasFile('content1_photo') || $request->hasFile('content2_photo') || $request->hasFile('content3_photo')) {
            	
            $destinationPath = public_path('/storage/frontend/');
        	
        	if($request->hasFile('content1_photo') && $request->hasFile('content2_photo') && $request->hasFile('content3_photo')) {
        		$file1 = $request->file('content1_photo');
            	$filename1 = $file1->getClientOriginalName() . '.' . $file1->getClientOriginalExtension();

	        	$file2 = $request->file('content2_photo');
	            $filename2 = $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();

	        	$file3 = $request->file('content3_photo');
	            $filename3 = $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();

            	$file1->move($destinationPath, $filename1);
            	$file2->move($destinationPath, $filename2);
            	$file3->move($destinationPath, $filename3);

        		$about->update([
	                'content1_photo' => $filename1,
	                'content2_photo' => $filename2,
	                'content3_photo' => $filename3,
	            ]);
        	}else if(!$request->hasFile('content1_photo') && $request->hasFile('content2_photo') && $request->hasFile('content3_photo')) {

	        	$file2 = $request->file('content2_photo');
	            $filename2 = $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();

	        	$file3 = $request->file('content3_photo');
	            $filename3 = $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();

            	$file2->move($destinationPath, $filename2);
            	$file3->move($destinationPath, $filename3);

	            $about->update([
	                'content2_photo' => $filename2,
	                'content3_photo' => $filename3,
	            ]);

        	}else if($request->hasFile('content1_photo') && !$request->hasFile('content2_photo') && $request->hasFile('content3_photo')) {

	        	$file1 = $request->file('content1_photo');
            	$filename1 = $file1->getClientOriginalName() . '.' . $file1->getClientOriginalExtension();

	        	$file3 = $request->file('content3_photo');
	            $filename3 = $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();

            	$file1->move($destinationPath, $filename1);
            	$file3->move($destinationPath, $filename3);

	            $about->update([
	                'content1_photo' => $filename1,
	                'content3_photo' => $filename3,
	            ]);

        	}else if($request->hasFile('content1_photo') && $request->hasFile('content2_photo') && !$request->hasFile('content3_photo')) {

	        	$file1 = $request->file('content1_photo');
            	$filename1 = $file1->getClientOriginalName() . '.' . $file1->getClientOriginalExtension();

	        	$file2 = $request->file('content2_photo');
	            $filename2 = $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();

            	$file1->move($destinationPath, $filename1);
            	$file2->move($destinationPath, $filename2);

	            $about->update([
	                'content1_photo' => $filename1,
	                'content2_photo' => $filename2,
	            ]);

        	}else if(!$request->hasFile('content1_photo') && !$request->hasFile('content2_photo') && $request->hasFile('content3_photo')) {

	        	$file3 = $request->file('content3_photo');
	            $filename3 = $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();

            	$file3->move($destinationPath, $filename3);

	            $about->update([
	                'content3_photo' => $filename3,
	            ]);

        	}else if(!$request->hasFile('content1_photo') && $request->hasFile('content2_photo') && !$request->hasFile('content3_photo')) {

	        	$file2 = $request->file('content2_photo');
	            $filename2 = $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();

            	$file2->move($destinationPath, $filename2);

	            $about->update([
	                'content2_photo' => $filename2,
	            ]);

        	}else if($request->hasFile('content1_photo') && !$request->hasFile('content2_photo') && !$request->hasFile('content3_photo')) {

	        	$file1 = $request->file('content1_photo');
            	$filename1 = $file1->getClientOriginalName() . '.' . $file1->getClientOriginalExtension();

            	$file1->move($destinationPath, $filename1);

	            $about->update([
	                'content1_photo' => $filename1,
	            ]);

        	}

            return redirect(route('frontend.image'))->with(['success' => 'Data was successfully created.']);
        }else if ($request->hasFile('profile1_photo') || $request->hasFile('profile2_photo') || $request->hasFile('profile3_photo')) {
            	
            $destinationPath = public_path('/storage/frontend/');
        	
        	if($request->hasFile('profile1_photo') && $request->hasFile('profile2_photo') && $request->hasFile('profile3_photo')) {
        		$file1 = $request->file('profile1_photo');
            	$filename1 = $file1->getClientOriginalName() . '.' . $file1->getClientOriginalExtension();

	        	$file2 = $request->file('profile2_photo');
	            $filename2 = $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();

	        	$file3 = $request->file('profile3_photo');
	            $filename3 = $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();

            	$file1->move($destinationPath, $filename1);
            	$file2->move($destinationPath, $filename2);
            	$file3->move($destinationPath, $filename3);

        		$about->update([
	                'profile1_photo' => $filename1,
	                'profile2_photo' => $filename2,
	                'profile3_photo' => $filename3,
	            ]);
        	}else if(!$request->hasFile('profile1_photo') && $request->hasFile('profile2_photo') && $request->hasFile('profile3_photo')) {

	        	$file2 = $request->file('profile2_photo');
	            $filename2 = $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();

	        	$file3 = $request->file('profile3_photo');
	            $filename3 = $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();

            	$file2->move($destinationPath, $filename2);
            	$file3->move($destinationPath, $filename3);

	            $about->update([
	                'profile2_photo' => $filename2,
	                'profile3_photo' => $filename3,
	            ]);

        	}else if($request->hasFile('profile1_photo') && !$request->hasFile('profile2_photo') && $request->hasFile('profile3_photo')) {

	        	$file1 = $request->file('profile1_photo');
            	$filename1 = $file1->getClientOriginalName() . '.' . $file1->getClientOriginalExtension();

	        	$file3 = $request->file('profile3_photo');
	            $filename3 = $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();

            	$file1->move($destinationPath, $filename1);
            	$file3->move($destinationPath, $filename3);

	            $about->update([
	                'profile1_photo' => $filename1,
	                'profile3_photo' => $filename3,
	            ]);

        	}else if($request->hasFile('profile1_photo') && $request->hasFile('profile2_photo') && !$request->hasFile('profile3_photo')) {

	        	$file1 = $request->file('profile1_photo');
            	$filename1 = $file1->getClientOriginalName() . '.' . $file1->getClientOriginalExtension();

	        	$file2 = $request->file('profile2_photo');
	            $filename2 = $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();

            	$file1->move($destinationPath, $filename1);
            	$file2->move($destinationPath, $filename2);

	            $about->update([
	                'profile1_photo' => $filename1,
	                'profile2_photo' => $filename2,
	            ]);

        	}else if(!$request->hasFile('profile1_photo') && !$request->hasFile('profile2_photo') && $request->hasFile('profile3_photo')) {

	        	$file3 = $request->file('profile3_photo');
	            $filename3 = $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();

            	$file3->move($destinationPath, $filename3);

	            $about->update([
	                'profile3_photo' => $filename3,
	            ]);

        	}else if(!$request->hasFile('profile1_photo') && $request->hasFile('profile2_photo') && !$request->hasFile('profile3_photo')) {

	        	$file2 = $request->file('profile2_photo');
	            $filename2 = $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();

            	$file2->move($destinationPath, $filename2);

	            $about->update([
	                'profile2_photo' => $filename2,
	            ]);

        	}else if($request->hasFile('profile1_photo') && !$request->hasFile('profile2_photo') && !$request->hasFile('profile3_photo')) {

	        	$file1 = $request->file('profile1_photo');
            	$filename1 = $file1->getClientOriginalName() . '.' . $file1->getClientOriginalExtension();

            	$file1->move($destinationPath, $filename1);

	            $about->update([
	                'profile1_photo' => $filename1,
	            ]);

        	}

            return redirect(route('frontend.image'))->with(['success' => 'Data was successfully created.']);
        }
    }
}
