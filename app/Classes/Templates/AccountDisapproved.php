<?php

namespace App\Classes\Templates;
use App\Classes\Abstracts\BaseTemplate;

class AccountDisapproved extends BaseTemplate
{
    protected $subject = "Account Disapproved!";

    protected $body = "Hi {{name}},\n"
        ."We're sadly to inform you that your account has been disapproved.\n"
        ."The reason for that is:\n"
        ."{{reason}}";
}
