<?php

namespace App\Listeners;

use App\Mail\Mail as MailMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $mail ;
    protected $code ;
    public function __construct($mail , $code)
    {
        $this -> mail = $mail;
        $this -> code = $code;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($this->mail)->send(new MailMail($this -> code));
    }
}
