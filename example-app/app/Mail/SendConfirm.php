<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $links ;
    public function __construct( $links)
    {
        $this -> links = $links;
    }


    public function build()
    {
        return $this->view('mail.sendConfirm',['links' => $this->links]);
    }
}
