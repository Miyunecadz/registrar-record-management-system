<?php

namespace App\Classes\Abstracts;

abstract class BaseTemplate
{
    protected $subject;

    protected $body;

    protected $footer = "Copyright 2023 {{app_name}}. All rights reserved.";

    protected function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    protected function setBody($body)
    {
        $this->body = $body;
    }

    public function getBody()
    {
        return $this->body;
    }

    protected function setFooter($footer)
    {
        $this->footer = $footer;
    }

    public function getFooter()
    {
        return $this->footer;
    }

    protected function setAttributes($subject, $body, $footer)
    {
        if($subject) {
            $this->subject = $subject;
        }

        if($body) {
            $this->body = $body;
        }

        if($footer) {
            $this->footer = $footer;
        }

    }

    public function toString($subject = '', $body = '', $footer = '')
    {
        $this->setAttributes($subject,$body, $footer);
        return $this->subject . "\n\n". $this->body . "\n\n". $this->footer;
    }

    public function toArray($subject = '', $body = '', $footer = '')
    {
        $this->setAttributes($subject,$body, $footer);

        return [
            'subject' => $this->subject,
            'body' => $this->body,
            'footer' => $this->footer
        ];
    }
}
