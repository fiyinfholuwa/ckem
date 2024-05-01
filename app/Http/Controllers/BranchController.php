<?php

namespace App\Http\Controllers;

use App\Models\AttendanceChurch;
use App\Models\ChurchMember;
use App\Models\ChurchRequest;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
    public function branch_attendance_view()
    {
        return view('branch.attendance_view');
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
    public function branch_attendance_add(Request $request)
    {
        $request->validate([
            'male' => 'required',
            'female' => 'required',
            'children' => 'required',
            'the_date' => 'required',
            'activity' => 'required',
        ]);

        $church_attendance = new AttendanceChurch;
        $church_attendance->male = $request->male;
        $church_attendance->female = $request->female;
        $church_attendance->children = $request->children;
        $church_attendance->the_date = $request->the_date;
        $church_attendance->activity = $request->activity;
        $church_attendance->branch_id = Auth::user()->id;
        $church_attendance->save();
        $notification = array(
            'message' => 'Attendance Successfully added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_attendance_Update(Request $request, $id)
    {
        $request->validate([
            'male' => 'required',
            'female' => 'required',
            'children' => 'required',
            'the_date' => 'required',
            'activity' => 'required',
        ]);

        $church_attendance = AttendanceChurch::findOrFail($id);
        $church_attendance->male = $request->male;
        $church_attendance->female = $request->female;
        $church_attendance->children = $request->children;
        $church_attendance->the_date = $request->the_date;
        $church_attendance->activity = $request->activity;
        $church_attendance->branch_id = Auth::user()->id;
        $church_attendance->save();
        $notification = array(
            'message' => 'Attendance Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('branch.attendance.all')->with($notification);
    }

    public function branch_request_all()
    {
        $requests = ChurchRequest::where('user_id', '=', Auth::user()->id)->get();
        return view('branch.request_all', compact('requests'));
    }
    public function branch_attendance_all()
    {
        $attendances = AttendanceChurch::where('branch_id', '=', Auth::user()->id)->get();
        return view('branch.attendance_all', compact('attendances'));
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
    public function branch_attendance_delete($id)
    {
        $church_attendance = AttendanceChurch::findOrFail($id);
        $church_attendance->delete();
        $notification = array(
            'message' => 'Church Successfully Deleted',
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
    public function branch_attendance_edit($id)
    {
        $attendance = AttendanceChurch::findOrFail($id);

        return view('branch.attendance_edit', compact('attendance'));
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

    public  function export_branch_members(){
        ini_set('max_execution_time', 0);

        $data = DB::table('church_members')->where('branch_id', '=', Auth::user()->id)->get();
        $excelContent = "SN, Full Name, Phone Number,Email, Worker Status, Ordained Status\n"; // Header row
        $i = 0;
        foreach ($data as $item) {
            $i++;
            $excelContent .= $i . ','. $item->name . ',' . $item->phone . ',' . $item->email . ',' . $item->worker_status . ',' . $item->ordained_status . "\n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=all_members_export.csv");
        echo $excelContent;
        exit;
    }

    public  function export_branch_workers(){
        ini_set('max_execution_time', 0);

        $data = DB::table('church_members')->where('branch_id', '=', Auth::user()->id)->where('worker_status', '=', 'yes')->get();
        $excelContent = "SN, Full Name, Phone Number,Email, Worker Status, Ordained Status\n"; // Header row
        $i = 0;
        foreach ($data as $item) {
            $i++;
            $excelContent .= $i . ','. $item->name . ',' . $item->phone . ',' . $item->email . ',' . $item->worker_status . ',' . $item->ordained_status . "\n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=all_workers_export.csv");
        echo $excelContent;
        exit;
    }public  function export_branch_ordained(){
        ini_set('max_execution_time', 0);

        $data = DB::table('church_members')->where('branch_id', '=', Auth::user()->id)->where('ordained_status', '=', 'yes')->get();
        $excelContent = "SN, Full Name, Phone Number,Email, Worker Status, Ordained Status\n"; // Header row
        $i = 0;
        foreach ($data as $item) {
            $i++;
            $excelContent .= $i . ','. $item->name . ',' . $item->phone . ',' . $item->email . ',' . $item->worker_status . ',' . $item->ordained_status . "\n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=all_ordained_export.csv");
        echo $excelContent;
        exit;
    }

}
