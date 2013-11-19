<?php

require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6Lcx1eISAAAAAGPTgu-0tdvgWo0WeA5iS9574Dcc";
$privatekey = "6Lcx1eISAAAAALY5Q7asfiEraMsZtf3dHmcvZrpk";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_GET["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_GET["recaptcha_challenge_field"],
                                        $_GET["recaptcha_response_field"]);

        if ($resp->is_valid) {
            echo "true";
        } else {
                # set the error code so that we can display it
                //$error = $resp->error;
            echo 'false';
        }
}
?>
