<?php

namespace App\Http\Controllers;

use Aloha\Twilio\Twilio;
use App\Notifications\NewOrder;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendNotification(){
        $user = Supplier::first();

        $details = [
            'name' => $user['name'],
            'greeting' => 'Hi'. $user['name'],
            'body' => 'A new Order from Olusegun fo 30 bags of Dangote Cement is in play. Advised delivery time is 2 days. Thank you',
            'thanks' => "thanks for working with Buildeasy",
            'actionText' => 'Tap to view order',
            'actionUrl' => '/',
            'order_id' => '293930022ijduc9d'
        ];

        Notification::send($user, new NewOrder($details));

        return response()->json(["noti" => $user->notifications]);
    }
    public function sendSms(){
        $user = Supplier::first();

        try{
            $account_id = env('TWILIO_ACCOUNT_SID');
            $auth_token = env('TWILIO_AUTH_TOKEN');
            $from_phone_number = '+15306658889'; // phone number you've chosen from Twilio
            $twilio = new Twilio($account_id, $auth_token, $from_phone_number);

            $to_phone_number = '+2348053870717'; // who are you sending to?
            $twilio->message($to_phone_number, 'Your Buildeasy Verification code is: 5045');

            dd('done');
        }catch(\Exception $e){
            dd($e);
        }

    }
}
