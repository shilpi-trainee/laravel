<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $first_name;
    public $last_name;
    public $image;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name,$last_name,$image)
    {
        $this->name = $first_name;
        $this->name = $last_name;
        $this->name = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.name');
    }
}
