<?php

namespace App\Services;

use App\Models\Student;
use App\Classes\Templates\AccountApproved as AccountApprovedTemplate;

class RequestorService
{
    public function approve($studentId)
    {
        $student = Student::where("id", $studentId)->first();

        if (!$student) {
            return false;
        }

        $accountApprovedTemplate = new AccountApprovedTemplate();

        $body = str_replace('{{name}}', $student->fullName(),  $accountApprovedTemplate->getBody());
        $footer = str_replace('{{app_name}}', config('app.name'),  $accountApprovedTemplate->getFooter());

        $message = $accountApprovedTemplate->toString('',$body,$footer);

        $student->approve();

        if(config('app.env') == 'testing') {
            return true;
        }

        return (new SmsNotificationService())->send($student->contact_number, config('vonage.sms_from'), $message);
    }

    public function decline($studentId, $reason)
    {
        $student = Student::where("id", $studentId)->first();

        if (!$student) {
            return false;
        }

        $accountApprovedTemplate = new AccountApprovedTemplate();
        $body = str_replace([
            '{{name}}', '{{reason}}'
        ], [
            $student->fullName(), $reason
        ],  $accountApprovedTemplate->getBody());
        $footer = str_replace('{{app_name}}', config('app.name'),  $accountApprovedTemplate->getFooter());
        $message = $accountApprovedTemplate->toString('',$body,$footer);


        $student->delete();

        if(config('app.env') == 'testing') {
            return true;
        }

        return (new SmsNotificationService())->send($student->contact_number, config('vonage.sms_from'), $message);
    }
}
