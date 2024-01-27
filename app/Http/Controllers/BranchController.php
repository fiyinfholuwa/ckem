<?php

namespace App\Http\Controllers;

use App\Models\ChurchMember;
use App\Models\ChurchRequest;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class BranchController extends Controller
{
    public function branch_member_view()
    {
        return view('branch.member_view');
    }

    public function branch_member_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'worker_status' => 'required',
            'ordained_status' => 'required'
        ]);

        $check_if_member_exist = ChurchMember::where('email', '=', $request->email)->first();
        if ($check_if_member_exist) {
            $notification = array(
                'message' => 'Email Already Exist',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $member = new ChurchMember;
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->worker_status = $request->worker_status;
        $member->ordained_status = $request->ordained_status;
        $member->branch_id = Auth::user()->id;
        $member->save();
        $notification = array(
            'message' => 'Member Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_member_all()
    {
        $members = ChurchMember::where('branch_id', '=', Auth::user()->id)->get();
        return view('branch.members_all', compact('members'));
    }

    public function branch_member_worker_all()
    {
        $members = ChurchMember::where('worker_status', '=', 'yes')->where('branch_id', '=', Auth::user()->id)->get();
        return view('branch.members_worker_all', compact('members'));
    }

    public function branch_member_ordained_all()
    {
        $members = ChurchMember::where('worker_status', '=', 'yes')->where('branch_id', '=', Auth::user()->id)->where('ordained_status', '=', 'yes')->get();
        return view('branch.members_ordained_all', compact('members'));
    }

    public function branch_member_edit($id)
    {
        $member = ChurchMember::findOrFail($id);
        return view('branch.member_edit', compact('member'));
    }

    public function branch_member_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'worker_status' => 'required',
            'ordained_status' => 'required'
        ]);

        $member = ChurchMember::findOrFail($id);
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->worker_status = $request->worker_status;
        $member->ordained_status = $request->ordained_status;
        $member->branch_id = Auth::user()->id;
        $member->save();
        $notification = array(
            'message' => 'Member Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('branch.member.all')->with($notification);
    }


    public function branch_member_delete($id)
    {
        ChurchMember::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Member Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function branch_testimonial_view()
    {
        return view('branch.testimonial_view');
    }

    public function branch_testimonial_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'title' => 'required'
        ]);
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/testimonial/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $directory . $filename;

        $new_test = new Testimonial;
        $new_test->name = $request->name;
        $new_test->content = $request->content;
        $new_test->title = $request->title;
        $new_test->user_id = Auth::user()->id;
        $new_test->status = "pending";
        $new_test->image = $path;
        $new_test->save();
        $notification = array(
            'message' => 'Testimonial Successfully added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_testimonial_all()
    {
        $testimonials = Testimonial::where('user_id', '=', Auth::user()->id)->get();
        return view('branch.testimonial_all', compact('testimonials'));
    }

    public function branch_testimonial_delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $filePath = $testimonial->image;
        File::delete(public_path($filePath));
        $testimonial->delete();
        $notification = array(
            'message' => 'Testimonial Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_testimonial_edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('branch.testimonial_edit', compact('testimonial'));
    }

    public function branch_testimonial_update(Request $request, $id)
    {
        $testimonial_update = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'title' => 'required'
        ]);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/testimonial/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $directory . $filename;

        } else {
            $path = $testimonial_update->image;
        }
        $testimonial_update->name = $request->name;
        $testimonial_update->content = $request->content;
        $testimonial_update->title = $request->title;
        $testimonial_update->user_id = Auth::user()->id;
        $testimonial_update->status = "active";
        $testimonial_update->image = $path;
        $testimonial_update->save();
        $notification = array(
            'message' => 'Testimonial Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('branch.testimonial.all')->with($notification);
    }


    public function branch_request_view()
    {
        return view('branch.request_view');
    }

    public function branch_request_add(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required'
        ]);

        $church_request = new ChurchRequest;
        $church_request->subject = $request->subject;
        $church_request->body = $request->body;
        $church_request->user_id = Auth::user()->id;
        $church_request->status = "pending";
        $church_request->save();
        $notification = array(
            'message' => 'Request Successfully added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_request_all()
    {
        $requests = ChurchRequest::where('user_id', '=', Auth::user()->id)->get();
        return view('branch.request_all', compact('requests'));
    }

    public function branch_request_delete($id)
    {
        $church_request = ChurchRequest::findOrFail($id);
        if ($church_request->status != "pending") {
            $notification = array(
                'message' => 'You cant delete this request, admin is currently working on it.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $church_request->delete();
        $notification = array(
            'message' => 'Request Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_request_edit($id)
    {
        $request = ChurchRequest::findOrFail($id);
        if ($request->status != "pending") {
            $notification = array(
                'message' => 'You cant edit this request, admin is currently working on it.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return view('branch.request_edit', compact('request'));
    }

    public function branch_request_update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required'
        ]);

        $church_request = ChurchRequest::findOrFail($id);
        $church_request->subject = $request->subject;
        $church_request->body = $request->body;
        $church_request->user_id = Auth::user()->id;
        $church_request->status = "pending";
        $church_request->save();
        $notification = array(
            'message' => 'Request Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('branch.request.all')->with($notification);
    }

    public function branch_password_view()
    {
        return view('branch.change_password');
    }

    public function branch_password_change(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Incorrect Password, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

}
