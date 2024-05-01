<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Pastor;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\SpecialEvent;
use App\Models\Attendance;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class FrontendController extends Controller
{
    public function home(){
        $audios = Audio::paginate(3);
        $pastors = Pastor::paginate(4);
        $testimonials = Testimonial::where('status', '=', 'active')->paginate(5);
        return view('frontend.home', compact('testimonials','audios', 'pastors'));
    }

    public function about(){
        $pastors = Pastor::all();
        return view('frontend.about', compact('pastors'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function sermons(){
        $audios = Audio::paginate(6);
        return view('frontend.sermon', compact('audios'));
    }

    public function events(){
        $events = SpecialEvent::paginate(3);
        return view('frontend.event', compact('events'));
    }

    public function event_detail($id){
        $event = SpecialEvent::where('title_slug', '=', $id)->first();
        return view('frontend.event_detail', compact('event'));
    }

    public function donation(){
        return view('frontend.donation');
    }
    public function media(){
        return view('frontend.media');
    }
    public function blog(){
        $posts = Post::paginate(6);
        return view('frontend.blog', compact('posts'));
    }


    public function blog_detail($id){
        $posts = Post::inRandomOrder()->paginate(6);
        $post = Post::where('post_url', '=', $id)->first();
        $comments = Comment::where('post_id', '=', $post->id)->get();
        return view('frontend.blog_detail', compact('post', 'posts', 'comments'));
    }



    public function contact_save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $attendance = new Contact;
        $attendance->name = $request->name;
        $attendance->email = $request->email;
        $attendance->phone = $request->phone;
        $attendance->subject = $request->subject;
        $attendance->message= $request->message;
        $attendance->save();
        $notification = array(
            'message' => 'Message sent Successfully, we will get back to you shortly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }





    public function attendance_event_save(Request $request){



        // Function to assign fruits to users randomly
        function assignFruitsToUser() {
            $fruits_of_the_spirit = array(
                "Love",
                "Joy",
                "Peace",
                "Patience",
                "Kindness",
                "Goodness",
                "Faithfulness",
                "Gentleness",
                "Self-control",
                "Mercy",
                "Humility",
                "Forgiveness"
            );

            $random_index = mt_rand(0, count($fruits_of_the_spirit) - 1);

            return $fruits_of_the_spirit[$random_index];
        }

        $check_register = Attendance::where('email', '=', $request->email)->where('event_name', '=', $request->eventt_name)->first();
        if($check_register){
            $notification = array(
                'message' => 'you have already registered for this event, thank you for your time',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
        $attendance = new Attendance;
        $attendance->full_name = $request->full_name;
        $attendance->email = $request->email;
        $attendance->phone = $request->phone;
        $attendance->dob = $request->dob;
        $attendance->address= $request->address;
        $attendance->attend_before= $request->attend_before;
        $attendance->hear_about= $request->attend_before;
        $attendance->occupation= $request->occupation;
        $attendance->event_name= $request->event_name;
        $attendance->group= assignFruitsToUser();
        $attendance->save();
        $notification = array(
            'message' => 'Thank you for your time, God bless you.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function comment_add(Request $request){
        $request->validate([
            'name' => 'required',
            'message' => 'required'
        ]);

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->name = $request->name;
        $comment->message = $request->message;
        $comment->save();
        $notification = array(
            'message' => 'Comment Sucessfully posted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function paymentCallback()
    {
        $response = json_decode($this->verifyPayment(request('reference')));
        $data = $response->data;
        $reference = $data->reference;

        $updated = DB::table('payment')
            ->where('reference', $reference)
            ->update(['status' => 'paid']);
        if ($updated) {
            $notification = [
                'message' => 'Payment successful, Thank you God Bless you! Amen.',
                'alert-type' => 'success'
            ];

            return redirect()->route('donation')->with($notification);
        } else {
            $notification = [
                'message' => 'Error Occurred',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    public function makePayment(Request $request){
                $reference = "ckem".rand(0, 100000);
                $amount = $request->amount * 100;
                $amount_to_save = $amount/100;
                $formData = [
                    'full_name' => $request->full_name,
                    'email' =>$request->email,
                    'amount' => $amount,
                    'currency' => "NGN",
                    'channels' => ['card'],
                    'reference'=> $reference,
                    'callback_url' => route('pay.callback')
                ];
                $pay =json_decode($this->initializePayment($formData));
                if ($pay) {
                    if ($pay->status) {
                        $data = [
                            'full_name' => $request->full_name,
                            'payment_type' => $request->payment_type,
                            'email' => $request->email,
                            'amount'=>$request->amount,
                            'reference' => $reference,
                             'status' => 'pending',
                        ];
                        DB::table('payment')->insert($data);
                        return redirect($pay->data->authorization_url);
                    } else {
                        $notification = array(
                            'message' => 'try again later',
                            'alert-type' => 'error'
                        );

                        return back()->with($notification);
                    }

                } else {
                    $notification = array(
                        'message' => 'Network error, please try again later',
                        'alert-type' => 'error'
                    );
                    return back()->with($notification);
                }
    }
    public function initializePayment($formData){
        $url = "https://api.paystack.co/transaction/initialize";
        $field_string = http_build_query($formData);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
            "Cache-control: no-cache"
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function verifyPayment($reference){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Cache-control: no-cache"
            )
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
