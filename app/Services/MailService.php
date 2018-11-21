<?php

namespace App\Services;

use Validator;
use Session;
use DB;
use Input;
use Mail;
use GuzzleHttp\Client;
use View;

class MailService {

    public function __construct() {
        ;
    }

    /*
     * Send Email
     */

    public function sendEmail($email, $title, $contents) {
        try {
            $headers = "";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf8\r\n";

            mail($email, $title, $contents, $headers);
            return true;
        } catch (\Exception $ex) {
            //dd($ex);
            return false;
        }
    }

    public function send($email, $title, $contents) {
        try {

            $html_output = View::make('emails.register', $contents)->render();

            $headers = "";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf8\r\n";

            mail($email, $title, $html_output, $headers);
            return true;
        } catch (\Exception $ex) {
            //dd($ex);
            return false;
        }
    }

    /*
     * Forget Password Email
     */

    public function forgetPasswordEmail($email, $title, $contents) {
        try {

            $html_output = View::make('emails.forgetpasswordemail', $contents)->render();

            $headers = "";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf8\r\n";

            mail($email, $title, $html_output, $headers);
            return true;
        } catch (\Exception $ex) {
            //dd($ex);
            return false;
        }
    }

    /*
     * Contact Us Email
     */

    public function contactUsEmail($email, $title, $contents) {
        try {

            $html_output = View::make('emails.contact', $contents)->render();

            $headers = "";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf8\r\n";

            mail($email, $title, $html_output, $headers);
            return true;
        } catch (\Exception $ex) {
            //dd($ex);
            return false;
        }
    }

}
