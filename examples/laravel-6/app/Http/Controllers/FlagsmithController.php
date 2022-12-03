<?php
namespace App\Http\Controllers;

use Flagsmith;
use Illuminate\Http\Request;

class FlagsmithController extends Controller {

    public function run(Request $request) {

        /**
         * Flagsmith Examples
         *
         * Prerequisite:
         * - Signup on app.flagsmith.com and create an app
         * - On the left sidebar, navigate to your settings page and open Keys tab
         * - Generate a new Server-side Environment Keys
         * - Copy the key and assign it to FLAGSMITH_API_KEY=<your key> in your project .env
         * - Once done, run the default route
         *
         */

        // Create your first feature. Let's call it "is_google_signup_enabled"
        // and set it to true
        $flag = "is_google_signup_enabled";
        $is_google_signup_enabled = Flagsmith::isEnabled($flag);
        dump(compact("is_google_signup_enabled")); // true


        // Creating another key "btn_lbl_google_sign_up" with a custom value
        $flag = "btn_lbl_google_sign_up";
        $btn_lbl_google_sign_up = Flagsmith::getValue($flag);
        dump(compact("btn_lbl_google_sign_up")); // Google



        // |------- IDENTITY/USER BASED FLAGS -------| //
        // This time we're creating an identitiy specific flag.
        // We'll disable Google signup button for this user/identity in Flagsmith
        $flag = "is_google_signup_enabled";
        $identity = "user_123456";
        $is_google_signup_enabled = Flagsmith::isIdentityEnabled($flag, $identity);
        dump(compact("is_google_signup_enabled")); // false

        // Setting a custom value for this user/identity for "btn_lbl_google_sign_up"
        $flag = "btn_lbl_google_sign_up";
        $identity = "user_123456";
        $is_google_signup_enabled = Flagsmith::getIdentityValue($flag, $identity);
        dump(compact("is_google_signup_enabled")); // Not Google
    }
}
