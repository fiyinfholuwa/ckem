<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Audio;
use App\Models\MediaLink;


class AudioController extends Controller
{
    public function audio_view()
    {
        return view('backend.audio_view');
    }

    public function audio_add(Request $request){
        $request->validate([
            'title' => 'required',
            'preacher' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'file' => 'required|mimes:mp3',
        ]);
        $audio = new Audio;

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/audio/image/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $image_path = $directory . $filename;

//        $file = $request->file('file');
//        $extension = $file->getClientOriginalExtension();
//        $filename = time() . '.' . $extension;
//        $directory = 'uploads/audio/file/';
//        if (!file_exists($directory)) {
//            mkdir($directory, 0755, true);
//        }
//        $file->move($directory, $filename);
//        $audio_path = $directory . $filename;

        $file = $request->file('file');
        $timestamp = now()->timestamp; // Using Laravel's now() helper function
        $filename = $timestamp . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads/audio/file', $filename, 'public');
        $audio_path = 'uploads/audio/file/' . $filename;

        $audio->image = $image_path;
        $audio->file  = $audio_path;
        $audio->title = $request->title;
        $audio->preacher = $request->preacher;
        $audio->save();
        $notification = array(
            'message' => 'Audio Successfully added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function media_view()
    {
        $media = MediaLink::first();
        return view('backend.media_view', compact('media'));
    }
    public function media_add(Request $request){
        if ($request->media_id == null){
            $media = new MediaLink;
            $media->youtube = $request->youtube;
            $media->facebook = $request->facebook;
            $media->mixrl = $request->mixrl;
            $media->save();
            $notification = array(
                'message' => 'Media Links Successfully saved',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $media = MediaLink::findOrFail($request->media_id);
            $media->youtube = $request->youtube;
            $media->facebook = $request->facebook;
            $media->mixrl = $request->mixrl;
            $media->save();
            $notification = array(
                'message' => 'Media Links Successfully updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }

}
