<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

     protected $sub;
     protected $msg;
     protected $name;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$msg,$sub)
    {
        $this->name = $name;
        $this->msg = $msg;
        $this->sub = $sub;
        // dd($sub);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->sub);
        return $this->view('admin.notify.mail.email')
                    ->subject($this->sub)
                    ->with([
                      'msg' => $this->msg,
                      'name' => $this->name
                    ]);
    }
}
