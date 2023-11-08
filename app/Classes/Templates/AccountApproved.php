<?php

namespace App\Classes\Templates;
use App\Classes\Abstracts\BaseTemplate;

class AccountApproved extends BaseTemplate
{
    protected $subject = "Account Approved!";

    protected $body = "Hi {{name}},\n"
    . "We're thrilled to inform you that your account has been approved!\n"
    . "You can now login to the app. Enjoy!\n"
    . "Password: 1234";
}
