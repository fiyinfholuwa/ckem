<?php

namespace App\Http\Controllers;

use App\Mail\RegisterationEmail;
use App\Mail\RegisterationMail;
use App\Models\AdminRole;
use App\Models\ChurchMember;
use App\Models\ChurchRequest;
use App\Models\Contact;
use App\Models\Pastor;
use App\Models\SpecialEvent;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function testimonial_view(){
        return view('backend.testimonial_view');
    }

    public function testimonial_add(Request $request){
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
        $new_test->status = "active";
        $new_test->image = $path;
        $new_test->save();
        $notification = array(
            'message' => 'Testimonial Successfully added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function testimonial_all(){
        $testimonials = Testimonial::all();
        return view('backend.testimonial_all', compact('testimonials'));
    }

    public function testimonial_delete($id){
        $testimonial =  Testimonial::findOrFail($id);
        $filePath = $testimonial->image;
        File::delete(public_path($filePath));
        $testimonial->delete();
        $notification = array(
            'message' => 'Testimonial Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function testimonial_edit($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonial_edit', compact('testimonial'));
    }

    public function testimonial_update(Request $request, $id){
        $testimonial_update = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'title' => 'required'
        ]);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/testimonial/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $directory . $filename;

        }else{
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
        return redirect()->route('testimonial.all')->with($notification);
    }

    public function contact(){
        return view('frontend.contact');
    }
    public function contact_save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $add_message = new Contact;
        $add_message->name = $request->name;
        $add_message->email = $request->email;
        $add_message->phone = $request->phone;
        $add_message->subject = $request->subject;
        $add_message->message= $request->message;
        $add_message->save();
        $notification = array(
            'message' => 'Message sent Successfully, we will get back to you shortly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function get_all_message(){
        $all_messages = Contact::all();
        return view('backend.contacts', compact('all_messages'));
    }

    public function message_delete($id){
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Message Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_view(){
        return view('backend.branch_view');
    }

    public  function branch_add(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => 'required',
            'address' => 'required'
        ]);

        $min = 100000;
        $max = 999999;
        $randomNumber = rand($min, $max);
        $password = "ckem".$randomNumber;
        $add_user = new User;
        $add_user->name = $request->name;
        $add_user->email = $request->email;
        $add_user->phone = $request->phone;
        $add_user->address= $request->address;
        $add_user->user_type = 1;
        $add_user->password = Hash::make($password);
        $add_user->save();

        $message = 'Dear ' . $request->name . ',' . PHP_EOL . PHP_EOL .
            'Please Find attach below to your login detail. thank you.';
        $mailData = [
            'password' => $password,
            'message' => $message,
            'email' => $request->email
        ];
        Mail::to($request->email)->send(new RegisterationMail($mailData));
        $notification = array(
            'message' => 'Branch Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_all(){
        $branches = User::where('user_type', '=', 1)->get();
        return view('backend.branch_all', compact('branches'));
    }

    public function branch_delete($id){
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Branch Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function branch_edit($id){
        $branch = User::findOrFail($id);
        return view('backend.branch_edit', compact('branch'));
    }

    public function branch_update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $branch = User::findOrFail($id);
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->save();
        $notification = array(
            'message' => 'Branch Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('branch.all')->with($notification);
    }



    public function event_view(){
        return view('backend.event_view');
    }

    public function event_add(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $url_slug = strtolower($request->title);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);


        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/event/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $directory . $filename;
        $event = new SpecialEvent;
        $event->title = $request->title;
        $event->title_slug = $label_slug;
        $event->body = $request->body;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->image = $path;
        $event->save();
        $notification = array(
            'message' => 'Event Successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function event_all(){
        $events = SpecialEvent::all();
        return view('backend.event_all', compact('events'));
    }

    public function event_delete($id){
        $event =  SpecialEvent::findOrFail($id);
        $filePath = $event->image;
        File::delete(public_path($filePath));
        $event->delete();
        $notification = array(
            'message' => 'Event Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function event_edit($id){
        $event = SpecialEvent::findOrFail($id);
        return view('backend.event_edit', compact('event'));
    }

    public function event_update(Request $request, $id){
        $event = SpecialEvent::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if($request->hasfile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/event/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $directory . $filename;
        }else{
            $path = $event->image;
        }
        $url_slug = strtolower($request->title);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);

        $event->title = $request->title;
        $event->title_slug = $label_slug;
        $event->body = $request->body;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->image = $path;
        $event->save();

        $notification = array(
            'message' => 'Event Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('event.all')->with($notification);
    }


public function pastor_view(){
        return view('backend.pastor_view');
    }

    public function pastor_add(Request $request){
        $request->validate([
            'name' => 'required',
            'position' => 'required'
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/pastor/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $directory . $filename;
        $pastor = new Pastor;
        $pastor->name = $request->name;
        $pastor->position = $request->position;
        $pastor->image = $path;
        $pastor->save();
        $notification = array(
            'message' => 'Pastor Successfully added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function pastor_all(){
        $pastors = Pastor::all();
        return view('backend.pastor_all', compact('pastors'));
    }

    public function pastor_delete($id){
        $pastor =  Pastor::findOrFail($id);
        $filePath = $pastor->image;
        File::delete(public_path($filePath));
        $pastor->delete();
        $notification = array(
            'message' => 'Pastor Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function pastor_edit($id){
        $pastor = Pastor::findOrFail($id);
        return view('backend.pastor_edit', compact('pastor'));
    }

    public function pastor_update(Request $request, $id){
        $pastor = Pastor::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'position' => 'required'
        ]);

        if($request->hasfile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/pastor/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $directory . $filename;
        }else{
            $path = $pastor->image;
        }
        $pastor->name = $request->name;
        $pastor->position = $request->position;
        $pastor->image = $path;
        $pastor->save();

        $notification = array(
            'message' => 'Pastor Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('pastor.all')->with($notification);
    }

    public function member_view(){
        $branches = User::where('user_type', '=',1)->get();
        return view('backend.member_view', compact('branches'));
    }

    public function member_add(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'worker_status' => 'required',
            'ordained_status' => 'required'
        ]);

        $check_if_member_exist = ChurchMember::where('email', '=', $request->email)->first();
        if($check_if_member_exist){
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
        $member->branch_id = $request->branch_id;
        $member->save();
        $notification = array(
            'message' => 'Member Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function member_all(){
        $members = ChurchMember::all();
        return view('backend.members_all', compact('members'));
    }

    public function member_worker_all(){
        $members = ChurchMember::where('worker_status', '=', 'yes')->get();
        return view('backend.members_worker_all', compact('members'));
    }

    public function member_ordained_all(){
        $members = ChurchMember::where('worker_status', '=', 'yes')->where('ordained_status', '=', 'yes')->get();
        return view('backend.members_ordained_all', compact('members'));
    }

    public function member_edit($id){
        $member = ChurchMember::findOrFail($id);
        $branches = User::where('user_type', '=',1)->get();
        return view('backend.member_edit', compact('member', 'branches'));
    }

    public function member_update(Request $request, $id){
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
        $member->branch_id = $request->branch_id;
        $member->save();
        $notification = array(
            'message' => 'Member Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('member.all')->with($notification);
    }


    public function member_delete($id){
        ChurchMember::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Member Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function role_view(){
        $roles = AdminRole::all();
        return view('backend.role_view', compact('roles')) ;
    }

    public function role_add(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $add_role = new AdminRole;
        $add_role->name = $request->name;
        $add_role->save();
        $notification = array(
            'message' => 'role Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function role_delete($id){

        $delete_role =  AdminRole::findOrFail($id);
        $delete_role->delete();
        $notification = array(
            'message' => 'Role Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function role_permission($id){
        $role =  AdminRole::findOrFail($id);
        return view('backend.role_permission', compact('role'));
    }

    public function role_permission_set(Request $request, $id){
        $role =  AdminRole::findOrFail($id);
        $role->permission = $request->permission;
        $role->save();
        $notification = array(
            'message' => 'Permission Successfully Set',
            'alert-type' => 'success'
        );
        return redirect()->route('role.view')->with($notification);
    }

    public function role_edit($id){

        $role =  AdminRole::findOrFail($id);
        $roles = AdminRole::all();
        return view('backend.role_edit', compact('roles', 'role'));
    }

    public function role_update(Request $request, $id){
        $update_role =  AdminRole::findOrFail($id);
        $update_role->name = $request->name;
        $update_role->save();
        $notification = array(
            'message' => 'Role Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('role.view')->with($notification);
    }



    public function admin_manager_view(){
        $roles = AdminRole::all();
        $users = User::whereNotNull('user_role')->where('user_type', 2)->get();
        return view('backend.admin_manager_view', compact('roles', 'users'));
    }

    public function admin_admin_manager_save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => 'required',
            'user_role' => 'required',
        ]);

        $min = 100000;
        $max = 999999;
        $randomNumber = rand($min, $max);
        $password = "admin_manager".$randomNumber;
        $add_user = new User;
        $add_user->name = $request->name;
        $add_user->email = $request->email;
        $add_user->phone = $request->phone;
        $add_user->user_role = $request->user_role;
        $add_user->user_type = 2;
        $add_user->password = Hash::make($password);
        $add_user->save();

        $message = 'Dear ' . $request->first . ',' . PHP_EOL . PHP_EOL .
            'Please Find attach below to your login detail. thank you.';
        $mailData = [
            'password' => $password,
            'message' => $message,
            'email' => $request->email
        ];
        Mail::to($request->email)->send(new RegisterationMail($mailData));
        $notification = array(
            'message' => 'Admin Manager Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_manager_update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'user_role' => 'required'
        ]);

        $update_user = User::findOrFail($id);
        $update_user->name = $request->name;
        $update_user->email = $request->email;
        $update_user->phone = $request->phone;
        $update_user->user_type = 2;
        $update_user->user_role = $request->user_role;
        $update_user->save();
        $notification = array(
            'message' => 'Admin Manager Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin_manager.view')->with($notification);
    }

    public function admin_admin_manager_block(Request $request, $id){
        $user = User::findOrFail($id);
        $user->block = $request->status;
        $user->save();
        $notification = array(
            'message' => 'Admin Manager Successfully blocked',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_admin_manager_delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        $notification = array(
            'message' => 'Admin Manager Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_manager_edit($id){
        $user = User::findOrFail($id);
        $roles = AdminRole::all();
        $users = User::whereNotNull('user_role')->where('user_type', 2)->get();
        return view('backend.admin_manager_edit', compact('user', 'users', 'roles'));
    }


    public function admin_manager_all(){
        $users = User::where('user_type', '=', 1)->get();
        return view('backend.admin_manager_all', compact('users'));
    }


    public function admin_request_all(){
        $requests = ChurchRequest::all();
        return view('backend.request_all', compact('requests'));
    }

    public function admin_request_edit($id){
        $request = ChurchRequest::findOrFail($id);
        return view('backend.request_edit', compact('request'));
    }

    public function admin_request_update(Request $request, $id){

        $church_request = ChurchRequest::findOrFail($id);
        $church_request->status = $request->status;
        $church_request->save();
        $notification = array(
            'message' => 'Request Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.request.all')->with($notification);
    }

    public function admin_password_view()
    {
        return view('backend.change_password');
    }

    public function admin_password_change(Request $request)
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


    public  function export_admin_members(){
        ini_set('max_execution_time', 0);

        $data = DB::table('church_members')->get();
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

    public  function export_admin_workers(){
        ini_set('max_execution_time', 0);

        $data = DB::table('church_members')->where('worker_status', '=', 'yes')->get();
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
    }
    public  function export_admin_ordained(){
    ini_set('max_execution_time', 0);

    $data = DB::table('church_members')->where('ordained_status', '=', 'yes')->get();
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

