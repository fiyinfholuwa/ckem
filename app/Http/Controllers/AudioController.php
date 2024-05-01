<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

use App\Models\Audio;
use Illuminate\Support\Facades\File;
use App\Models\MediaLink;


class AudioController extends Controller
{
    public function audio_view()
    {
        $audios = Audio::all();
        return view('backend.audio_view', compact('audios'));
    }
    public function audio_edit($id)
    {
        $audio = Audio::findOrFail($id);
        $audios = Audio::all();
        return view('backend.audio_edit', compact('audios', 'audio'));
    }
    public function audio_all()
    {
        $audios = Audio::all();
        return view('backend.audio_all', compact('audios'));
    }

    public function audio_delete($id){
        $audio =  Audio::findOrFail($id);
        $filePath = $audio->image;
        File::delete(public_path($filePath));
        $audio->delete();
        $notification = array(
            'message' => 'Audio Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function message_delete($id){
        $contact =  Contact::findOrFail($id);
        $contact->delete();
        $notification = array(
            'message' => 'Contact Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function audio_add(Request $request){
        $request->validate([
            'title' => 'required',
            'preacher' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'link' => 'required',
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

        $audio->image = $image_path;
        $audio->file  = $request->link;
        $audio->title = $request->title;
        $audio->preacher = $request->preacher;
        $audio->save();
        $notification = array(
            'message' => 'Audio Successfully added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function audio_update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'preacher' => 'required',
            'link' => 'required',
        ]);
        $audio = Audio::findOrFail($id);
        if ($request->has('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/audio/image/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $image_path = $directory . $filename;

        }else{
            $image_path =$audio->image;
        }
        $audio->image = $image_path;
        $audio->file  = $request->link;
        $audio->title = $request->title;
        $audio->preacher = $request->preacher;
        $audio->save();
        $notification = array(
            'message' => 'Audio Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('audio.all')->with($notification);
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
