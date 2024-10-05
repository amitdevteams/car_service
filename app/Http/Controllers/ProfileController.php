<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function storeProfile(Request $request)
{
    $id = Auth::user()->id;

    // Update or create the profile based on the 'user_id'
    $data = Profile::updateOrCreate(
        ['user_id' => $id], // Search for the user by 'user_id'
        [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'price' => $request->price,
            'address' => $request->address,
        ]
    );

    // Check if multiple image files were uploaded
    if ($request->hasFile('image')) {
        $imageArray = []; // Array to store image filenames
        foreach ($request->file('image') as $file) {
            // Generate a unique filename
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();

            // Define the path to store the image
            $destinationPath = public_path('upload/admin_images/');

            // Move the uploaded image to the specified path without resizing
            $file->move($destinationPath, $filename);

            // Add the filename to the array
            $imageArray[] = $filename;
        }

        // Convert the array of filenames to a comma-separated string and store it
        $data->profile_image = implode(',', $imageArray);
    }

    // Check if a video file was uploaded
    if ($request->hasFile('youtube')) {
        $video = $request->file('youtube');

        // Generate a unique filename for the video
        $videoFilename = date('YmdHi') . '_' . $video->getClientOriginalName();

        // Define the path to store the video
        $destinationPath = public_path('upload/videos/');

        // Move the uploaded video to the public/videos directory
        $video->move($destinationPath, $videoFilename);

        // Save the video filename to the 'youtube_video' column in the database
        $data->youtube_video = $videoFilename; // Save the actual uploaded video filename
    } else {
        // If no video is uploaded, you can choose to keep the old value
        // or set it to null
        $data->youtube_video = null; // or keep the existing value as needed
    }

    // Save the profile data
    $data->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Profile updated successfully!');
}



    public function storeProfile_youtube(Request $request)
    {
        $id = Auth::user()->id;
        // Update or create the profile based on the 'user_id'
        $data = Profile::updateOrCreate(
            ['user_id' => $id], // Search for the user by 'user_id'
            [
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'price' => $request->price,
                'address' => $request->address,
                'youtube_video' => $request->youtube,
            ]
        );

        // Check if multiple files were uploaded
        if ($request->hasFile('image')) {
            $imageArray = []; // Array to store image filenames
            foreach ($request->file('image') as $file) {
                // Generate a unique filename
                $filename = date('YmdHi') . '_' . $file->getClientOriginalName();

                // Resize the image to 297x170 pixels
                $image = Image::make($file)->resize(297, 170, function ($constraint) {
                    $constraint->aspectRatio(); // Maintain the aspect ratio
                    $constraint->upsize();      // Prevent upsizing of smaller images
                });
                // Define the path to store the image
                $destinationPath = public_path('upload/admin_images/');

                // Save the resized image to the specified path
                $image->save($destinationPath . $filename);

                // Add the filename to the array
                $imageArray[] = $filename;
            }

            // Convert the array of filenames to a comma-separated string and store it
            $data->profile_image = implode(',', $imageArray);
        }
        // Save the profile data
        $data->save();
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }



    public function storeProfile_bkp(Request $request)
    {
        Log::info('what is coming in image' . $request->image);
        // Get the authenticated user's ID
        $id = Auth::user()->id;

        // Use updateOrCreate to find or create a profile based on the 'user_id'
        $data = Profile::updateOrCreate(
            ['user_id' => $id], // Search for the user by 'user_id'
            [
                'name' => $request->name,         // Assign request data to user attributes
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'price' => $request->price,
                'address' => $request->address,
            ]
        );
        if ($request->file('image')) {
            $file = $request->file('image')[0]; // Taking first image from array
            Log::info("Uploaded file: " . $file->getClientOriginalName());
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->profile_image = $filename;
        }

        $data->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function home()
    {
        // Fetch all profiles
        $all_profile = Profile::all();
        Log::info('Welcome to the home page' . $all_profile);
        return view('welcome', compact('all_profile'));
    }



}
