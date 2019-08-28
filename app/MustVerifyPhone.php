<?php
/**
 * Created by PhpStorm.
 * User: Anjola
 * Date: 8/18/2019
 * Time: 8:43 AM
 */

namespace App;


interface MustVerifyPhone
{

    /** Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedPhone();

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markPhoneAsVerified();
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendPhoneVerificationMessage();

}