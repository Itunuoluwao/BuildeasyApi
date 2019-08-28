<?php

namespace App;

use Aloha\Twilio\Twilio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model implements MustVerifyPhone
{
    use Notifiable;
    //

    protected $fillable = array('title','avi','supplier_id','place_id','LG','state','status','country','address');

    public static  $rules = array(
        'user_id' => 'required',
        'LG' => 'required',
        'state' => 'required',
        'status' => 'required',
        'title' => 'required',
        'country' => 'required',
        'address' => 'required',
        );


    public function hasVerifiedPhone(){

        return ! is_null($this->phone_verified_at);
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markPhoneAsVerified(){
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Send the email verification notification.
     *
     * @return int
     */
    public function  sendPhoneVerificationMessage(){
        try{
            $account_id = env('TWILIO_ACCOUNT_SID');
            $auth_token = env('TWILIO_AUTH_TOKEN');
            $from_phone_number = '+15306658889'; // phone number you've chosen from Twilio
            $twilio = new Twilio($account_id, $auth_token, $from_phone_number);

            $code = rand(1000, 9999);

            $twilio->message($this->phone_number, 'Your Buildeasy Verification code is:'. $code);

            return response()->json([
                'error' => 0,
                'code' => $code
            ]);


        }catch(\Exception $e){

            return response()->json([
                'error' => 1,
                'message' => $e->getMessage()
            ], 400);
        }

    }



}
